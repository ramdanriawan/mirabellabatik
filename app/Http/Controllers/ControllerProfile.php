<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use Illuminate\Support\Facades\File;

class ControllerProfile extends Controller
{
	public function index()
	{
		$datas['pelanggan'] = Pelanggan::findOrFail(Auth()->user()->id);
		return view('profile.index', $datas);
	}

	public function changephoto(Request $request)
	{
		if ( $request->gambar === null )
			return back()->with('error', 'Mohon pilih gambar!');

		// validasi dulu file yang sedang diinput
		$request['gambar_nama'] = $request->gambar->getClientOriginalName();
		$this->validate($request, [
			'gambar_nama' => 'unique:pelanggans,gambar'
		]);

		$this->validate($request, [
			'gambar' => 'image|max:1500|unique:pelanggans,gambar'
		]);

		// hapus gambar yang sebelumnya
		File::delete(Auth()->user()->gambar);

		// update nama gambar didatabase
		Pelanggan::where('id', Auth()->user()->id)->update(['gambar' => $request->gambar->getClientOriginalName()]);
		
		// pindahkan gambar ke asset/imgProfile
		$request->file('gambar')->move('asset/imgProfile', $request->gambar->getClientOriginalName());

		return back()->with('success', 'Berhasil Mengganti Photo Profile');
	}
}