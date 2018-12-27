<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class ControllerPelanggan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
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
        $this->validate($request, [
            'nama' => 'required|min:3',
            'telpon' => 'required|digits_between:10,15|numeric',
            'email' => 'required|email|min:5|unique:pelanggans,email',
            'alamat' => 'required|min:30',
            'password' => 'required|min:5|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:5'
        ]);

        // instansi object
        $pelanggan = new Pelanggan();

        // insert ke database
        $pelanggan->create([
            'nama' => $request->nama,
            'telpon' => $request->telpon,
            'email'=> $request->email,
            'alamat' => $request->alamat,
            'password' => $request->password
        ])->save();

        return redirect('/')->with('success', 'Berhasil meregistrasi user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
