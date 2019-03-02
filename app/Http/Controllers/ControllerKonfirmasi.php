<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konfirmasi;
use App\Order;

class ControllerKonfirmasi extends Controller
{
    public function index()
    {
        $datas['konfirmasis'] = Konfirmasi::paginate(10);

        return view('admin.home.konfirmasi.index', $datas);
    }

    public function ubah(Konfirmasi $konfirmasi)
    {
        Order::find($konfirmasi->order_id)
        ->update([
            'status_konfirmasi' => 'disetujui',
            'status_order' => 'sudah dibayar'
            ]);

        return back()->with('success', 'Berhasil Menyetujui Konfirmasi Dari ' . $konfirmasi->pelanggan->name);
    }

    public function cari(Request $request)
    {
        $datas['konfirmasis'] = Konfirmasi::where('nama_pengirim', 'like', "%$request->q%")->paginate(10);

        return view('admin.home.konfirmasi.index', $datas);
    }
}