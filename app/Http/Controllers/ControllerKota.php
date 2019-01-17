<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;

class ControllerKota extends Controller 
{
   public function index()
   {
       $datas['kotas'] = Kota::paginate(10);

       return view('admin.home.kota.index', $datas);
   }

   public function tambah()
   {
       return view('admin.home.kota.tambah');
   }

   public function tambahStore(Request $request)
   {
       $this->validate($request, [
           'nama_kota' => 'required|unique:kotas,nama_kota|min:3|max:30',
           'ongkir' => 'required|integer|digits_between:4,7|min:1000'
       ]);

        Kota::create([
            'nama_kota' => $request->nama_kota,
            'ongkir' => $request->ongkir
        ])->save();

        return back()->with('success', 'Berhasil Menambah Kota');
   }

   public function ubah(Kota $kota)
   {
       $datas['kota'] = $kota;

       return view('admin.home.kota.ubah', $datas);
   }

   public function ubahStore(Request $request, Kota $kota)
   {
       $this->validate($request, [
           'nama_kota' => 'required|unique:kotas,nama_kota|min:3|max:30',
           'ongkir' => 'required|integer|digits_between:4,7|min:1000'
       ]);

        Kota::find($kota->id)->update([
            'nama_kota' => $request->nama_kota,
            'ongkir' => $request->ongkir
        ]);

        return redirect('/admin/home/kota')->with('success', 'Berhasil Mengedit Kota');
   }
   
   public function cari(Request $request)
   {
        $datas['kotas'] = Kota::where('nama_kota', 'like', "%{$request->q}%")->paginate(10);

        return view('admin.home.kota.index', $datas);
   }

   public function hapus(Kota $kota)
   {
       $nama_kota = $kota->nama_kota;

       Kota::find($kota->id)->delete();

       return back()->with('success', 'Berhasil Menghapus Kota ' . $nama_kota);
   }

   
}