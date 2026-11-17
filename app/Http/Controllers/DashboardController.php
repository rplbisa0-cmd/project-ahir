<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMenu = Menu::count();
        $jumlahTransaksi = Transaksi::count();
        $pendapatanHariIni = Transaksi::whereDate('tanggal', today())->sum('total_harga');
        $transaksiTerbaru = Transaksi::latest('id')->take(5)->get();

        return view('dashboard', compact(
            'jumlahMenu',
            'jumlahTransaksi',
            'pendapatanHariIni',
            'transaksiTerbaru'
        ));
    }
}
