<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class ControllerKategori extends Controller
{
    public function index()
    {
        $datas['kategoris'] = Kategori::paginate(10);

        return view('admin.home.kategori.index', $datas);
    }

    public function tambah()
    {
       return view('admin.home.kategori.tambah');
    }

   public function tambahStore(Request $request)
   {
       $this->validate($request, [
           'jenis_kategori' => 'required|unique:kategoris,jenis_kategori|min:3|max:30',
       ]);

        kategori::create([
            'jenis_kategori' => $request->jenis_kategori,
        ])->save();

        return back()->with('success', 'Berhasil Menambah Kategori');
   }

   public function ubah(kategori $kategori)
   {
       $datas['kategori'] = $kategori;

       return view('admin.home.kategori.ubah', $datas);
   }

   public function ubahStore(Request $request, kategori $kategori)
   {
       $jenis_kategoriValidate = 'required|min:3|max:30';
       if ( $request->jenis_kategori != $kategori->jenis_kategori )
       {
            $jenis_kategoriValidate = 'required|unique:kategoris,jenis_kategori|min:3|max:30';
       }

       $this->validate($request, [
           'jenis_kategori' => $jenis_kategoriValidate,
       ]);

        kategori::find($kategori->id)->update([
            'jenis_kategori' => $request->jenis_kategori,
        ]);

        return redirect('/admin/home/kategori')->with('success', 'Berhasil Mengedit Kategori');
   }
   
   public function cari(Request $request)
   {
        $datas['kategoris'] = kategori::where('jenis_kategori', 'like', "%{$request->q}%")->paginate(10);

        return view('admin.home.kategori.index', $datas);
   }

   public function hapus(kategori $kategori)
   {
       $jenis_kategori = $kategori->jenis_kategori;

       kategori::find($kategori->id)->delete();

       return back()->with('success', 'Berhasil Menghapus kategori ' . $jenis_kategori);
   }

}