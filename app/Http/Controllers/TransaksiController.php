<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::latest('id')->paginate(10);
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $menus = Menu::orderBy('kategori')->orderBy('nama')->get();
        return view('transaksi.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => ['required', 'array'],
            'jumlah.*' => ['required', 'integer', 'min:0'],
            'pembayaran' => ['required', 'integer', 'min:0'],
        ]);

        $jumlahPesanan = collect($validated['jumlah'])
            ->filter(fn ($jumlah) => (int) $jumlah > 0);

        if ($jumlahPesanan->isEmpty()) {
            throw ValidationException::withMessages([
                'jumlah' => 'Pilih minimal satu menu dan masukkan jumlahnya.',
            ]);
        }

        $transaksi = DB::transaction(function () use ($jumlahPesanan, $validated) {
            $items = [];
            $total = 0;

            foreach ($jumlahPesanan as $menuId => $jumlah) {
                $menu = Menu::lockForUpdate()->find($menuId);

                if (!$menu) {
                    throw ValidationException::withMessages([
                        'jumlah' => 'Salah satu menu tidak ditemukan. Silakan muat ulang halaman.',
                    ]);
                }

                $jumlah = (int) $jumlah;
                $subtotal = $menu->harga * $jumlah;
                $total += $subtotal;

                $items[] = [
                    'menu_id' => $menu->id,
                    'nama_menu' => $menu->nama,
                    'harga' => $menu->harga,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                ];
            }

            $pembayaran = (int) $validated['pembayaran'];

            if ($pembayaran < $total) {
                throw ValidationException::withMessages([
                    'pembayaran' => 'Uang pembayaran kurang dari total belanja.',
                ]);
            }

            $transaksi = Transaksi::create([
                'tanggal' => now(),
                'total_harga' => $total,
                'pembayaran' => $pembayaran,
                'kembalian' => $pembayaran - $total,
            ]);

            $transaksi->details()->createMany($items);

            return $transaksi;
        });

        return redirect()->route('transaksi.show', $transaksi)
            ->with('success', 'Transaksi berhasil disimpan.');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load('details');
        return view('transaksi.show', compact('transaksi'));
    }
}
