<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Produk;

class ControllerLaporan extends Controller
{
    public function index()
    {
        return view('admin.home.laporan.index');
    }

    public function penjualan(Request $request)
    {
        $datas['orders'] = Order::whereBetween('created_at', [$request->tggl_mulai, $request->tggl_akhir])->where('status_diterima', '=', 'sudah')->get();
        $datas['tggl_mulai'] = $request->tggl_mulai;
        $datas['tggl_akhir'] = $request->tggl_akhir;
        return view('admin.home.laporan.penjualan', $datas);
    }

    public function produk(Request $request)
    {
        $datas['produks'] = Produk::whereBetween('created_at', [$request->tggl_mulai, $request->tggl_akhir])->get();

        return view('admin.home.laporan.produk', $datas);
    }
}
