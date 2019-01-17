<?php 
namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;

use Illuminate\Http\Request;

class ControllerSearch extends Controller
{
	public function index(Request $request)
	{
		$datas['produks'] = Produk::where('nama_produk', 'like', "%$request->q%")->paginate(10);
		$datas['kategoris'] = Kategori::all();

		return view('search.index', $datas);
	}

	public function filter(Request $request)
	{
		$kategori_id = $request->kategori_id;
		if ( $request->kategori_id === null )
		{
			$kategoris = array_values(Kategori::select('id')->get()->toArray());

			foreach($kategoris as $value)
			$kategori_id[] = $value['id'];
		}

		$order_by = '';
		$sort_by = 'asc';

		if ( $request->order_by == 'nama')
		{
			$order_by ='nama_produk';
		} else if ( $request->order_by == 'harga_terendah')
		{
			$order_by = 'harga';
			$sort_by = 'asc';
		} else if ( $request->order_by == 'harga_tertinggi' )
		{
			$order_by = 'harga';
			$sort_by = 'desc';
		} 
		else if ( $request->order_by == 'terbaru' )
		{
			$order_by = 'created_at';
			$sort_by = 'desc';
		} else if ( $request->order_by == 'terlama')
		{
			$order_by = 'tggl_masuk';
			$sort_by = 'asc';
		}

		$datas['produks'] = Produk::whereIn('kategori_id', $kategori_id)
		->where('nama_produk', 'like', "%$request->q%")
		->whereBetween('harga', [$request->between_price_from, $request->between_price_to])
		->orderBy($order_by, $sort_by)
		->paginate(10);

		return view('search.index', $datas);
	}
}