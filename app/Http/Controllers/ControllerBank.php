<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

class ControllerBank extends Controller 
{
   public function index()
   {
       $datas['banks'] = Bank::paginate(10);

       return view('admin.home.bank.index', $datas);
   }

   public function tambah()
   {
       return view('admin.home.bank.tambah');
   }

   public function tambahStore(Request $request)
   {
       $this->validate($request, [
           'no_rek' => 'required|numeric|digits_between:6,20|unique:banks,no_rek',
           'nama_bank' => 'required|min:3|max:30|string',
           'atas_nama' => 'required|min:3|max:30|string',
       ]);

        Bank::create([
            'no_rek' => $request->no_rek,
            'nama_bank' => $request->nama_bank,
            'atas_nama' => $request->atas_nama,
        ])->save();

        return back()->with('success', 'Berhasil Menambah Bank');
   }
   
   public function cari(Request $request)
   {
        $datas['banks'] = Bank::where('atas_nama', 'like', "%{$request->q}%")->paginate(10);

        return view('admin.home.bank.index', $datas);
   }

   public function ubah(bank $bank)
   {
       $datas['bank'] = $bank;

       return view('admin.home.bank.ubah', $datas);
   }

   public function ubahStore(Request $request, bank $bank)
   {
       $this->validate($request, [
           'no_rek' => 'required|numeric|digits_between:6,20',
           'nama_bank' => 'required',
           'atas_nama' => 'required',
       ]);

        bank::find($bank->id)->update([
            'no_rek' => $request->no_rek,
            'nama_bank' => $request->nama_bank,
            'atas_nama' => $request->atas_nama,
        ]);

        return redirect('/admin/home/bank')->with('success', 'Berhasil Mengedit Bank');
   }

   public function hapus(bank $bank)
   {
       bank::find($bank->id)->delete();

       return back()->with('success', 'Berhasil Menghapus Bank ' . $bank->atas_nama);
   }
   
}