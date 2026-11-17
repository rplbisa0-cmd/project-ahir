<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest('id')->paginate(10);

        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create', ['menu' => new Menu()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'kategori' => ['required', Rule::in(['Makanan', 'Minuman'])],
            'harga' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string', 'max:500'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('menus', 'public');
        }

        Menu::create($data);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    public function show(Menu $menu)
    {
        return redirect()->route('menu.index');
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'kategori' => ['required', Rule::in(['Makanan', 'Minuman'])],
            'harga' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string', 'max:500'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus foto lama jika ada
            if ($menu->gambar) {
                Storage::disk('public')->delete($menu->gambar);
            }

            // Simpan foto baru
            $data['gambar'] = $request->file('gambar')
                ->store('menus', 'public');
        }

        $menu->update($data);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->detailTransaksis()->exists()) {
            return redirect()->route('menu.index')
                ->with('error', 'Menu tidak dapat dihapus karena sudah tercatat dalam transaksi.');
        }

        // Hapus foto saat menu dihapus
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
