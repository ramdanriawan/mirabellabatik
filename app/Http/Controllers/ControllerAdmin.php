<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Admin;
use App\Bank;
use App\JenisBahan;
use App\Kategori;
use App\Konfirmasi;
use App\Kota;
use App\laporan;
use App\Order;
use App\Pelanggan;
use App\Produk;
use App\Ulasan;
use Illuminate\Support\Facades\Hash;

class ControllerAdmin extends Controller
{
	public function index()
	{
		$datas['admins'] = Admin::all()->toArray();
		$datas['banks'] = Bank::all()->toArray();
		$datas['jenisbahans'] = JenisBahan::all()->toArray();
		$datas['kategoris'] = Kategori::all()->toArray();
		$datas['konfirmasis'] = Konfirmasi::all()->toArray();
		$datas['kotas'] = Kota::all()->toArray();
		$datas['laporans'] = Laporan::all()->toArray();
		$datas['orders'] = order::all()->toArray();
		$datas['pelanggans'] = Pelanggan::all()->toArray();
		$datas['produks'] = Produk::all()->toArray();
		$datas['ulasans'] = Ulasan::all()->toArray();

		return view('admin.home.index', $datas);
	}

	public function login() 
	{
		if( Cookie::get('adminsession') == 1 )
			return redirect('admin/home');
		else
			return view('admin.login');
	}

	public function profile()
	{
		$datas['admin'] = Admin::find(Cookie::get('adminid'));
		
		return view('admin.home.profile', $datas);
	}

	public function profileUbah(Request $request)
	{ 
		$this->validate($request, [
			'password_lama' => [function($attribute, $value, $fail) use($request) {
				if ( !Hash::check($request->password_lama, Admin::find(Cookie::get('adminid'))->password) )
				
				$fail(str_replace('_', ' ', ucwords($attribute)) . " didn't match!");
			}]
		]);

		
		$this->validate($request, [
			'name' => 'required|string|max:30|min:3',
			'password' => 'required|string|max:30|min:3|confirmed',
			'password_lama' => 'required|string|max:30|min:3',
		]);

		Admin::find(Cookie::get('adminid'))
		->update([
				'name' => $request->name,
				'password' => $request->password,
			]);

		return redirect("/admin/login")->with('success', 'Berhasil merubah data admin')->withCookie(Cookie::forget('adminsession'))->withCookie(Cookie::forget('adminid'));
	}

	public function loginCek()
	{
        return redirect('/admin/home');
	}
	
	public function logout()
	{

       return redirect('/admin/login')->withCookie(Cookie::forget('adminsession'))->withCookie(Cookie::forget('adminid'));
    }
}