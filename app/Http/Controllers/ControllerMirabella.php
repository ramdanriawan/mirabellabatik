<?php
namespace App\Http\Controllers;

use App\Mirabella;
use App\Pelanggan;

use Illuminate\Http\Request;

class ControllerMirabella extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mirabellabatik.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mirabella  $mirabella
     * @return \Illuminate\Http\Response
     */
    public function show(Mirabella $mirabella)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mirabella  $mirabella
     * @return \Illuminate\Http\Response
     */
    public function edit(Mirabella $mirabella)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mirabella  $mirabella
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mirabella $mirabella)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mirabella  $mirabella
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mirabella $mirabella)
    {
        //
    }

    public function login()
    {
        return view('mirabellabatik.login');
    }

    public function loginCek(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $pelanggan = new Pelanggan();

        if($pelanggan->where('email', $email)->first() && $pelanggan->where('password', $password)->first())
        {
            return view('mirabellabatik.index')->with('success', "Berhasil Login");
        } else {
            return back()->with('errors', "Gagal Login");
        }

    }
}
