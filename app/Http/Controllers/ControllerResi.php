<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resi;
use App\Order;

class ControllerResi extends Controller
{
    public function index()
    {

    }

    public function tambah(Order $order)
    {
        $datas['order'] = $order;

        return view('admin.home.resi.tambah', $datas);
    }

    public function tambahStore(Request $request, Order $order)
    {
        $this->validate($request, [
            'resi' => 'required|alpha_num|max:30|unique:resis,resi'
        ]);

        Resi::create([
            'order_id' => $order->id,
            'resi' => $request->resi
        ])->save();

        return redirect('/admin/home/order')->with('success', 'Berhasil menambah resi untuk order ' . $order->id);
    }

    public function ubah(Resi $resi)
    {
        $datas['resi'] = $resi;
        return view('admin.home.resi.ubah', $datas);
    }

    public function ubahStore(Request $request, Resi $resi)
    {
        $this->validate($request, [
            'resi' => 'required|alpha_num|max:30|unique:resis,resi'
        ]);

        Resi::find($resi->id)
        ->update([
            'resi' => $request->resi
        ]);

        return redirect('/admin/home/order')->with('success', 'Berhasil Mengubah Resi');
    }
}