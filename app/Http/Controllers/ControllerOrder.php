<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Kota;
use App\Order;
use App\OrderDetail;
use App\Produk;
use App\Kurir;

class ControllerOrder extends Controller 
{
   public function index()
   {
       $datas['orders'] = Order::whereNotNull('kota_id')->paginate(10);

       return view('admin.home.order.index', $datas);
   }

   public function tambah()
   {
       $datas['kotas'] = Kota::all();
       $datas['pelanggans'] = Pelanggan::all();

       return view('admin.home.order.tambah', $datas);
   }

//    public function tambahStore(Request $request)
//    {
//        $this->validate($request, [
//            'name' => 'required|min:3|max:30|string',
//            'telpon' => 'required|numeric|digits_between:10,13|unique:pelanggans,telpon',
//            'alamat' => 'required|string|max:255',
//            'kota_id' => 'required|integer|exists:kotas,id',
//            'email' => 'required|email|unique:pelanggans,email|max:255',
//            'password' => 'required|max:50|confirmed',
//        ]);

//         Pelanggan::create([
//             'name' => $request->name,
//             'telpon' => $request->telpon,
//             'alamat' => $request->alamat,
//             'kota_id' => $request->kota_id,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ])->save();

//         return back()->with('success', 'Berhasil Menambah Pelanggan');
//    }
   
   public function ubah(Order $order)
   {
       $datas['order'] = $order;
       $datas['pelanggans'] = pelanggan::all();
       $datas['kotas'] = Kota::all();
       $datas['kurirs'] = Kurir::all();
       
       return view('admin.home.order.ubah', $datas);
   }

   public function ubahStore(Request $request, order $order)
   { 
        // lakukan validasi
       $this->validate($request, [
           'pelanggan_id' => 'required|exists:pelanggans,id',
           'tgl_order' => 'required',
           'alamat_pengiriman' => 'required',
           'kota_id' => 'required|exists:kotas,id',
           'status_order' => 'required',
           'status_konfirmasi' => 'required',
           'status_diterima' => 'required',
           'kurir_id' => 'required|exists:kurirs,id',
       ]);

        $request->except(['_token']);
       
       Order::find($order->id)->update($request->all());

        return redirect('/admin/home/order')->with('success', 'Berhasil Mengedit Order');
   }

   public function cari(Request $request)
   {
        $pelanggans = Pelanggan::where('name', 'like', "%{$request->q}%")->pluck('id')->toArray();
        $datas['orders'] = Order::whereIn('pelanggan_id', $pelanggans)->paginate(10);

        return view('admin.home.order.index', $datas);
   }

   public function detail(Order $order)
   {
       $datas['order_details'] = OrderDetail::where('order_id', '=', $order->id)->get();

       return view('admin.home.order.produkOrderDetail', $datas);
   }
   
}