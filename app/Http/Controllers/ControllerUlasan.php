<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ulasan;

class ControllerUlasan extends Controller
{
	public function index()
	{
        $datas['ulasans'] = Ulasan::whereNotNull('produk_id')->paginate(10);

		return view('admin.home.ulasan.index', $datas);
    }

    public function tambah()
   {
       
   }

   public function tambahStore(Request $request)
   {
       
   }

   public function cari(Request $request)
   {
        $datas['ulasans'] = Ulasan::where('isi_ulasan', 'like', "%$request->q%")->paginate(10);

        return view('admin.home.ulasan.index', $datas);
   }
}