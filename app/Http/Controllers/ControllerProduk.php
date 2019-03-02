<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Produk;
use App\Kategori;
use App\JenisBahan;
use App\UkuranProduk;

class ControllerProduk extends Controller 
{
    public $gambarTidakBolehSama;

    public function __construct(Request $request)
    {
              
       $this->gambarTidakBolehSama = function($attribute, $value, $fail){
           global $request;

           if ( $request->gambar->getClientOriginalName() ==  $request->gambar_belakang->getClientOriginalName()) {
               $attribute = str_replace('_', ' ', $attribute);

               $fail("$attribute can't be same");
            }
        };
    }

   public function index()
   {
       $datas['produks'] = produk::paginate(10);

       return view('admin.home.produk.index', $datas);
   }

   public function tambah()
   {
       $datas['kategoris'] = Kategori::all();
       $datas['jenis_bahans'] = JenisBahan::all();

       return view('admin.home.produk.tambah', $datas);
   }

   public function tambahStore(Request $request)
   { 
        // dd($request);
        // tambahkan gambar_nama dan gambar_belakang_nama untuk mengecek apakah nama gambar di database sudah ada atau belum
       $request['gambar_nama'] = $request->gambar->getClientOriginalName();
       $request['gambar_belakang_nama'] = $request->gambar_belakang->getClientOriginalName();

        // validasi inputan dan gambar supaya tidak boleh sama
       $this->validate($request, [
           'kategori_id' => 'required|integer|digits_between:1,1000000',
           'jenis_bahan_id' => 'required|integer|digits_between:1,1000000',
           'nama_produk' => 'required|unique:produks,nama_produk|min:3|max:100',
           'deskripsi' => 'required|string|max:255',
           'harga' => 'required|integer|digits_between:4,7',
           'smallStok' => 'required|integer|min:0|digits_between:1,6',
           'mediumStok' => 'required|integer|min:0|digits_between:1,6',
           'largeStok' => 'required|integer|min:0|digits_between:1,6',
           'xtraLargeStok' => 'required|integer|min:0|digits_between:1,6',
        //    'stok' => 'required|integer|digits_between:1,5',
           'berat' => 'required|integer|digits_between:1,2',
           'gambar' => 'required|image',
           'gambar_belakang' => 'required|image',
           'gambar_nama' => 'unique:produks,gambar',
           'gambar_belakang_nama' => 'unique:produks,gambar',
           'diskon' => 'required|integer|max:100',
           'tggl_masuk' => 'required|date',
       ]);
 

        $this->validate($request, [
            'gambar_nama' => ['unique:produks,gambar_belakang', $this->gambarTidakBolehSama],
            'gambar_belakang_nama' => ['unique:produks,gambar', $this->gambarTidakBolehSama],
        ]);

        // simpan ke database
        $produkSave = produk::create([
            'kategori_id' => $request->kategori_id,
            'jenis_bahan_id' => $request->jenis_bahan_id,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->smallStok + $request->mediumStok + $request->largeStok + $request->xtraLargeStok,
            'berat' => $request->berat,
            'gambar' => $request->gambar->getClientOriginalName(),
            'gambar_belakang' => $request->gambar_belakang->getClientOriginalName(),
            'diskon' => $request->diskon,
            'tggl_masuk' => $request->tggl_masuk
        ]);

        $produk_id = $produkSave->id;
        $produkSave->save();

        // untuk ukuran produk
        UkuranProduk::create([
            'produk_id' => $produk_id,
            'ukuran' => 'small',
            'stok' => $request->smallStok,
        ])->save(); 

        UkuranProduk::create([
            'produk_id' => $produk_id,
            'ukuran' => 'medium',
            'stok' => $request->mediumStok,
        ])->save(); 

        UkuranProduk::create([
            'produk_id' => $produk_id,
            'ukuran' => 'large',
            'stok' => $request->largeStok,
        ])->save(); 

        UkuranProduk::create([
            'produk_id' => $produk_id,
            'ukuran' => 'xtra large',
            'stok' => $request->xtraLargeStok,
        ])->save(); 
        
        // simpan gambar ke folder
        $request->file('gambar')->move('asset/imgBarang', $request->gambar->getClientOriginalName());
        $request->file('gambar_belakang')->move('asset/imgBarang', $request->gambar_belakang->getClientOriginalName());

        // kembali ke halamn sebelumnya dan beritahukan jika berhasil menambah produk
        return back()->with('success', 'Berhasil Menambah produk');
   }

   public function ubah(produk $produk)
   {
       $datas['produk'] = $produk;
       $datas['kategoris'] = Kategori::all();
       $datas['jenis_bahans'] = JenisBahan::all();
       
       return view('admin.home.produk.ubah', $datas);
   }

   public function ubahStore(Request $request, produk $produk)
   { 
        // untuk mengubah ukuran produk
        UkuranProduk::where('produk_id', '=', $produk->id)->where('ukuran', '=', 'small')->update(['stok' => $request->smallStok]);
        UkuranProduk::where('produk_id', '=', $produk->id)->where('ukuran', '=', 'medium')->update(['stok' => $request->mediumStok]);
        UkuranProduk::where('produk_id', '=', $produk->id)->where('ukuran', '=', 'large')->update(['stok' => $request->largeStok]);
        UkuranProduk::where('produk_id', '=', $produk->id)->where('ukuran', '=', 'xtra large')->update(['stok' => $request->xtraLargeStok]);

       // tambahkan gambar_nama dan gambar_belakang_nama untuk mengecek apakah nama gambar di database sudah ada atau belum
       $gambarValidate = '';
       if ( $request->gambar !== null)
       {
           $request['gambar_nama'] = $request->gambar->getClientOriginalName();
           $request['gambar_belakang_nama'] = $request->gambar_belakang->getClientOriginalName();
           
            // cek dan tambahkan validasi jika user berusaha untuk merubah gambarnya
           if ( $request->gambar !== null )
           {
               if ( $request->gambar->getClientOriginalName() != $produk->gambar ) {
                    $gambarValidate = ['image', $this->gambarTidakBolehSama];
               }
           }
       }

       $gambar_belakangValidate = '';
       if ( $request->gambar_belakang !== null )
       {
           if ( $request->gambar_belakang !== null )
           {
               if ( $request->gambar_belakang->getClientOriginalName() != $produk->gambar ) {
                    $gambar_belakangValidate = ['image', $this->gambarTidakBolehSama];
               }
           }
       }

      // validasi untuk nama produk yang tidak boleh sama didatabase jika user berusaha untuk merubah gambarnya
      $nama_produkValidate = 'required|min:3|max:100';
      if ( $request->nama_produk != $produk->nama_produk )
      {
          $nama_produkValidate = 'required|unique:produks,nama_produk|min:3|max:100';
      }

        // lakukan validasi
       $this->validate($request, [
           'kategori_id' => 'required|integer|digits_between:1,1000000',
           'jenis_bahan_id' => 'required|integer|digits_between:1,1000000',
           'nama_produk' => $nama_produkValidate,
           'deskripsi' => 'required|string|max:255',
           'harga' => 'required|integer|digits_between:4,7',
           'smallStok' => 'required|integer|min:0|digits_between:1,6',
           'mediumStok' => 'required|integer|min:0|digits_between:1,6',
           'largeStok' => 'required|integer|min:0|digits_between:1,6',
           'xtraLargeStok' => 'required|integer|min:0|digits_between:1,6',
        //    'stok' => 'required|integer|digits_between:1,5',
           'berat' => 'required|integer|digits_between:1,2',
           'gambar' => $gambarValidate,
           'gambar_belakang' => $gambar_belakangValidate,
           'gambar_nama' => 'unique:produks,gambar',
           'gambar_belakang_nama' => 'unique:produks,gambar_belakang',
           'diskon' => 'required|integer|max:100',
           'tggl_masuk' => 'required|date',
       ]);

       $this->validate($request, [
            'gambar_nama' => 'unique:produks,gambar_belakang',
            'gambar_belakang_nama' => 'unique:produks,gambar',
       ]);

       // pindahkan gambar yang baru diupload dan hapus gambar dari uploadan sebelumnya, dan set nama yang akan disimpan ke database
       $gambar = $produk->gambar;
       if ( $gambarValidate != '')
       { 
           $gambar = $request->gambar->getClientOriginalName();
           $request->file('gambar')->move('asset/imgBarang', $gambar);

            File::delete("asset/imgBarang/$produk->gambar");
       }

       $gambar_belakang = $produk->gambar_belakang;
       if ( $gambar_belakangValidate != '')
       {
           $gambar_belakang = $request->gambar_belakang->getClientOriginalName();
           $request->file('gambar_belakang')->move('asset/imgBarang', $gambar_belakang);

           File::delete("asset/imgBarang/$produk->gambar_belakang");
       }

        // update produk
        produk::find($produk->id)->update([
            'kategori_id' => $request->kategori_id,
            'jenis_bahan_id' => $request->jenis_bahan_id,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->smallStok + $request->mediumStok + $request->largeStok + $request->xtraLargeStok,
            'berat' => $request->berat,
            'gambar' => $gambar,
            'gambar_belakang' => $gambar_belakang,
            'diskon' => $request->diskon,
            'tggl_masuk' => $request->tggl_masuk
        ]);

        return redirect('/admin/home/produk')->with('success', 'Berhasil Mengedit produk');
   }
   
   public function cari(Request $request)
   {
        $datas['produks'] = produk::where('nama_produk', 'like', "%{$request->q}%")->paginate(10);

        return view('admin.home.produk.index', $datas);
   }

   public function hapus(produk $produk)
   {
       $nama_produk = $produk->nama_produk;

       produk::find($produk->id)->delete();

       File::delete("asset/imgBarang/$produk->gambar");
       File::delete("asset/imgBarang/$produk->gambar_belakang");

       return back()->with('success', 'Berhasil Menghapus produk ' . $nama_produk);
   }

   
}