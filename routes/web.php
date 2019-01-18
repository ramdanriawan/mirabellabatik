<?php

// authentication login user biasa
Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

// untuk menangai pengiriman email
Route::post('mail', 'ControllerMail@send');

// untuk menangani halaman privacy
// Route::get('/privacy', 'ControllerMirabella@privacy');
Route::get('/about', 'ControllerMirabella@about');

// user yang sudah login akan diarahkan kesini
Route::prefix('home')->middleware('auth')->group(function(){
    // untuk halaman awal
    Route::get('/', 'ControllerMirabella@index');
    
    // untuk halaman produk berdasarkan kategori
    Route::get('/kategori/{kategori}', 'ControllerMirabella@produkKategori');
    
    // untuk halaman pencarian
    Route::get('/search', 'ControllerSearch@index');
    Route::post('/search/filter', 'ControllerSearch@filter');
    
    // untuk halaman profile
    Route::get('/profile', 'ControllerProfile@index');
    Route::post('/profile/changephoto', 'ControllerProfile@changephoto');
    
    // untuk pelanggan
    Route::resource('/pelanggan', 'ControllerPelanggan');
    
    // untuk halaman checkout
    Route::get('/checkout', 'ControllerMirabella@checkout');
    Route::post('/checkout', 'ControllerMirabella@checkoutNext');
    
    // untuk halaman produk detail
    Route::get('/produk/detail/{produk}', 'ControllerMirabella@produkDetail');
    
    //untuk membuat stok produk sesuai ukuran yang dipilih
    Route::get('/produk/detail/{produk}/{ukuran_produk}/cekstok', 'ControllerMirabella@cekStok');

    // untuk mengatasi user yang order produk
    Route::get('/produk/{produk}/order', 'ControllerMirabella@produkOrder');
    
    // untuk menangani konfirmasi order dari user
    Route::get('/produk/order/konfirmasi/{order}', 'ControllerMirabella@produkOrderKonfirmasi');
    Route::post('/produk/order/konfirmasi/{order}', 'ControllerMirabella@produkOrderKonfirmasiSave');
    Route::get('/produk/order/cancel/{order}', 'ControllerMirabella@pembelianHapus');
    Route::get('/produk/order/terimabarang/{order}', 'ControllerMirabella@terimaBarang');
    
    // untuk melihat order detail
    Route::get('/produk/order/detail/{order}', 'ControllerMirabella@produkOrderDetail');

    // untuk menangani user yang cancel beberapa item yang telah diorder
    Route::get('/produk/order/detail/{order}/{orderdetail}/cancel', 'ControllerMirabella@produkOrderDetailCancel');
    
    // untuk mengatasi halaman pembelina
    Route::get('/pembelian', 'ControllerMirabella@pembelian');
});

// route khusus untuk admin
Route::get('/admin/login', 'ControllerAdmin@login');

Route::prefix('admin')->middleware('admin')->group(function() {
    Route::post('/login', 'ControllerAdmin@loginCek');
    Route::get('/logout', 'ControllerAdmin@logout');
    
    // halaman yang bisa dikelola oleh admin yang sudah berhasil login
    Route::prefix('home')->group(function(){
        Route::get('/', 'ControllerAdmin@index');
        Route::get('/profile', 'ControllerAdmin@profile');
        Route::post('/profile/ubah', 'ControllerAdmin@profileUbah');
        
        // untuk menangani tabel kota
        Route::get('kota', 'ControllerKota@index');
        Route::get('kota/cari', 'ControllerKota@cari');
        Route::get('kota/tambah', 'ControllerKota@tambah');
        Route::post('kota/tambah', 'ControllerKota@tambahStore');
        Route::get('kota/ubah/{kota}', 'ControllerKota@ubah');
        Route::post('kota/ubah/{kota}', 'ControllerKota@ubahStore');
        Route::get('kota/hapus/{kota}', 'ControllerKota@hapus');
        
        // untuk menangani tabel produk
        Route::get('produk', 'ControllerProduk@index');
        Route::get('produk/cari', 'ControllerProduk@cari');
        Route::get('produk/tambah', 'ControllerProduk@tambah');
        Route::post('produk/tambah', 'ControllerProduk@tambahStore');
        Route::get('produk/ubah/{produk}', 'ControllerProduk@ubah');
        Route::post('produk/ubah/{produk}', 'ControllerProduk@ubahStore');
        Route::get('produk/hapus/{produk}', 'ControllerProduk@hapus');
        
        // untuk menangani tabel kategori
        Route::get('kategori', 'ControllerKategori@index');
        Route::get('kategori/cari', 'ControllerKategori@cari');
        Route::get('kategori/tambah', 'ControllerKategori@tambah');
        Route::post('kategori/tambah', 'ControllerKategori@tambahStore');
        Route::get('kategori/ubah/{kategori}', 'ControllerKategori@ubah');
        Route::post('kategori/ubah/{kategori}', 'ControllerKategori@ubahStore');
        Route::get('kategori/hapus/{kategori}', 'ControllerKategori@hapus');
        
        // untuk menangani tabel jenis bahan
        Route::get('jenisbahan', 'ControllerJenisBahan@index');
        Route::get('jenisbahan/cari', 'ControllerJenisBahan@cari');
        Route::get('jenisbahan/tambah', 'ControllerJenisBahan@tambah');
        Route::post('jenisbahan/tambah', 'ControllerJenisBahan@tambahStore');
        Route::get('jenisbahan/ubah/{jenisbahan}', 'ControllerJenisBahan@ubah');
        Route::post('jenisbahan/ubah/{jenisbahan}', 'ControllerJenisBahan@ubahStore');
        Route::get('jenisbahan/hapus/{jenisbahan}', 'ControllerJenisBahan@hapus');
        
        // untuk menangani tabel pelanggan
        Route::get('pelanggan', 'ControllerPelanggan@index');
        Route::get('pelanggan/cari', 'ControllerPelanggan@cari');
        Route::get('pelanggan/tambah', 'ControllerPelanggan@tambah');
        Route::post('pelanggan/tambah', 'ControllerPelanggan@tambahStore');
        
        // untuk menangani tabel ulasan
        Route::get('ulasan', 'ControllerUlasan@index');
        Route::get('ulasan/cari', 'ControllerUlasan@cari');
        
        // untuk menangani tabel bank
        Route::get('bank', 'ControllerBank@index');
        Route::get('bank/cari', 'ControllerBank@cari');
        Route::get('bank/tambah', 'ControllerBank@tambah');
        Route::post('bank/tambah', 'ControllerBank@tambahStore');
        
        // untuk menangani tabel orders
        Route::get('order', 'ControllerOrder@index');
        Route::get('order/cari', 'ControllerOrder@cari');
        Route::get('order/tambah', 'ControllerOrder@tambah');
        Route::post('order/tambah', 'ControllerOrder@tambahStore');
        Route::get('order/ubah/{order}', 'ControllerOrder@ubah');
        Route::post('order/ubah/{order}', 'ControllerOrder@ubahStore');

        Route::get('order/detail/{order}', 'ControllerOrder@detail');
        
        // untuk menangani tabel Konfirmasi
        Route::get('konfirmasi', 'ControllerKonfirmasi@index');
        Route::get('konfirmasi/cari', 'ControllerKonfirmasi@cari');
        Route::get('konfirmasi/tambah', 'ControllerKonfirmasi@tambah');
        Route::post('konfirmasi/tambah', 'ControllerKonfirmasi@tambahStore');
        Route::get('konfirmasi/ubah/{konfirmasi}', 'ControllerKonfirmasi@ubah');
        
        // untuk menangani tabel laporan
        Route::get('laporan', 'ControllerLaporan@index');
        Route::post('laporan/penjualan', 'ControllerLaporan@penjualan');
        Route::post('laporan/produk', 'ControllerLaporan@produk');
        Route::get('laporan/cari', 'ControllerLaporan@cari');
        Route::get('laporan/tambah', 'ControllerLaporan@tambah');
        Route::post('laporan/tambah', 'ControllerLaporan@tambahStore');
        Route::get('laporan/ubah/{laporan}', 'ControllerLaporan@ubah');
        Route::post('laporan/ubah/{laporan}', 'ControllerLaporan@ubahStore');
        
        
        // untuk menangani tabel resi
        Route::get('resi', 'ControllerResi@index');
        Route::get('resi/cari', 'ControllerResi@cari');
        Route::get('resi/tambah/{order}', 'ControllerResi@tambah');
        Route::post('resi/tambah/{order}', 'ControllerResi@tambahStore');
        Route::get('resi/ubah/{resi}', 'ControllerResi@ubah');
        Route::post('resi/ubah/{resi}', 'ControllerResi@ubahStore');
    });
});

Route::get('/test', function(){
    dd(DB::table('order_details')->where('order_id', '=', 18)->delete() === 0);
});