<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Kota;
use App\Order;
use App\OrderDetail;

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
       
       return view('admin.home.order.ubah', $datas);
   }

   public function ubahStore(Request $request, produk $produk)
   { 
       // tambahkan gambar_nama dan gambar_belakang_nama untuk mengecek apakah nama gambar di database sudah ada atau belum
       $request['gambar_nama'] = $request->gambar->getClientOriginalName();
       $request['gambar_belakang_nama'] = $request->gambar->getClientOriginalName();
       
        // cek dan tambahkan validasi jika user berusaha untuk merubah gambarnya
       $gambarValidate = '';
       if ( $request->gambar !== null )
       {
           if ( $request->gambar->getClientOriginalName() != $produk->gambar ) {
                $gambarValidate = ['image', $this->gambarTidakBolehSama];
           }
       }

      $gambar_belakangValidate = '';
      if ( $request->gambar_belakang !== null )
      {
          if ( $request->gambar_belakang->getClientOriginalName() != $produk->gambar ) {
               $gambar_belakangValidate = ['image', $this->gambarTidakBolehSama];
          }
      }

      // validasi untuk nama produk yang tidak boleh sama didatabase jika user berusaha untuk merubah gambarnya
      $nama_produkValidate = 'required|min:3|max:100';
      if ( $request->nama_produk != $produk->nama_produk )
      {
          $nama_produkValidate = 'required|unique:produks,nama_produk|min:3|max:100';
      }

        // lakukan validasi
       $this->validate($request, [
           'kategori_id' => 'required|integer|digits_between:1,1000000',
           'jenis_bahan_id' => 'required|integer|digits_between:1,1000000',
           'nama_produk' => $nama_produkValidate,
           'deskripsi' => 'required|string|max:255',
           'harga' => 'required|integer|digits_between:4,7',
           'stok' => 'required|integer|digits_between:1,5',
           'berat' => 'required|integer|digits_between:1,2',
           'gambar' => $gambarValidate,
           'gambar_belakang' => $gambar_belakangValidate,
           'gambar_nama' => 'unique:produks,gambar',
           'gambar_belakang_nama' => 'unique:produks,gambar_belakang',
           'diskon' => 'required|integer|max:100',
           'tggl_masuk' => 'required|date',
       ]);

       $this->validate($request, [
            'gambar_nama' => 'unique:produks,gambar_belakang',
            'gambar_belakang_nama' => 'unique:produks,gambar',
       ]);

       // pindahkan gambar yang baru diupload dan hapus gambar dari uploadan sebelumnya, dan set nama yang akan disimpan ke database
       $gambar = $produk->gambar;
       if ( $gambarValidate != '')
       { 
           $gambar = $request->gambar->getClientOriginalName();
           $request->file('gambar')->move('asset/imgBarang', $gambar);

            File::delete("asset/imgBarang/$produk->gambar");
       }

       $gambar_belakang = $produk->gambar_belakang;
       if ( $gambar_belakangValidate != '')
       {
           $gambar_belakang = $request->gambar_belakang->getClientOriginalName();
           $request->file('gambar_belakang')->move('asset/imgBarang', $gambar_belakang);

           File::delete("asset/imgBarang/$produk->gambar_belakang");
       }

        // update produk
        produk::find($produk->id)->update([
            'kategori_id' => $request->kategori_id,
            'jenis_bahan_id' => $request->jenis_bahan_id,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'berat' => $request->berat,
            'gambar' => $gambar,
            'gambar_belakang' => $gambar_belakang,
            'diskon' => $request->diskon,
            'tggl_masuk' => $request->tggl_masuk
        ]);

        return redirect('/admin/home/produk')->with('success', 'Berhasil Mengedit produk');
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