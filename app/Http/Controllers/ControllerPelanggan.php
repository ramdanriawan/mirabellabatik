<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Kota;
use Illuminate\Support\Facades\Hash;

class ControllerPelanggan extends Controller 
{
   public function index()
   {
       $datas['pelanggans'] = Pelanggan::paginate(10);

       return view('admin.home.pelanggan.index', $datas);
   }

   public function tambah()
   {
       $datas['kotas'] = Kota::all();

       return view('admin.home.pelanggan.tambah', $datas);
   }

   public function tambahStore(Request $request)
   {
       $this->validate($request, [
           'name' => 'required|min:3|max:30|string',
           'telpon' => 'required|numeric|digits_between:10,13|unique:pelanggans,telpon',
           'alamat' => 'required|string|max:255',
           'kota_id' => 'required|integer|exists:kotas,id',
           'email' => 'required|email|unique:pelanggans,email|max:255',
           'password' => 'required|max:50|confirmed',
       ]);

        Pelanggan::create([
            'name' => $request->name,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
            'kota_id' => $request->kota_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->save();

        return back()->with('success', 'Berhasil Menambah Pelanggan');
   }
   
   public function cari(Request $request)
   {
        $datas['pelanggans'] = Pelanggan::where('name', 'like', "%{$request->q}%")->paginate(10);

        return view('admin.home.pelanggan.index', $datas);
   }
   
}