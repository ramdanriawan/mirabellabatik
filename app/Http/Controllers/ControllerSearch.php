<?php 
namespace App\Http\Controllers;

use App\Pelanggan;

use Illuminate\Http\Request;

class ControllerSearch extends Controller
{
	public function index(Request $request)
	{
		return view('search.index');
	}
}