<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisBahan;

class ControllerJenisBahan extends Controller
{
    public function index()
    {
        $datas['jenisbahans'] = jenisbahan::paginate(10);

        return view('admin.home.jenisbahan.index', $datas);
    }

    public function tambah()
    {
       return view('admin.home.jenisbahan.tambah');
    }

   public function tambahStore(Request $request)
   {
       $this->validate($request, [
           'nama_bahan' => 'required|unique:jenis_bahans,nama_bahan|min:3|max:30',
       ]);

        jenisbahan::create([
            'nama_bahan' => $request->nama_bahan,
        ])->save();

        return back()->with('success', 'Berhasil Menambah jenisbahan');
   }

   public function ubah(jenisbahan $jenisbahan)
   {
       $datas['jenisbahan'] = $jenisbahan;

       return view('admin.home.jenisbahan.ubah', $datas);
   }

   public function ubahStore(Request $request, jenisbahan $jenisbahan)
   {
       $nama_bahanValidate = 'required|min:3|max:30';
       if ( $request->nama_bahan != $jenisbahan->nama_bahan )
       {
            $nama_bahanValidate = 'required|unique:jenis_bahans,nama_bahan|min:3|max:30';
       }

       $this->validate($request, [
           'nama_bahan' => $nama_bahanValidate,
       ]);

        jenisbahan::find($jenisbahan->id)->update([
            'nama_bahan' => $request->nama_bahan,
        ]);

        return redirect('/admin/home/jenisbahan')->with('success', 'Berhasil Mengedit Jenis Bahan');
   }
   
   public function cari(Request $request)
   {
        $datas['jenisbahans'] = jenisbahan::where('nama_bahan', 'like', "%{$request->q}%")->paginate(10);

        return view('admin.home.jenisbahan.index', $datas);
   }

   public function hapus(jenisbahan $jenisbahan)
   {
       $nama_bahan = $jenisbahan->nama_bahan;

       jenisbahan::find($jenisbahan->id)->delete();

       return back()->with('success', 'Berhasil Menghapus Jenis Bahan ' . $nama_bahan);
   }

}