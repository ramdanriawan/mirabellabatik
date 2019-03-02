<?php
namespace App\Http\Controllers;

use App\Mirabella;
use App\Pelanggan;
use App\Kategori;
use App\Produk;
use App\Kota;
use App\Kurir;
use App\BankPayment;
use App\Bank;
use App\Order;
use App\OrderDetail;
use App\Konfirmasi;
use App\UkuranProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class ControllerMirabella extends Controller
{

    public function index()
    {
        $datas['produks'] = Produk::paginate(10);
        return view('mirabellabatik.index', $datas);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Mirabella $mirabella)
    {
        //
    }

    public function edit(Mirabella $mirabella)
    {
        //
    }

    public function update(Request $request, Mirabella $mirabella)
    {
        //
    }

    public function destroy(Mirabella $mirabella)
    {
        //
    }

    public function produkKategori(Kategori $kategori)
    {
        $datas['produks'] = Produk::where('kategori_id', $kategori->id)->paginate(10);
        $datas['jenis_kategori'] = Kategori::find($kategori->id)->jenis_kategori;

        return view('mirabellabatik.index', $datas);
    }

    public function privacy()
    {
        return view('mirabellabatik.privacy');
    }

    public function checkout()
    {
        $datas['kotas'] = Kota::all();
        $datas['kurirs'] = Kurir::all();
        $datas['order_details'] = OrderDetail::where('order_id', '=', Cookie::get('order_id'))->get();
        $datas['bank_payments'] = BankPayment::all();

        if(count($datas['order_details']->toArray()) == 0)
        {
            return back()->with('error', 'Belum ada item yang ditambahkan!');
        }

        return view('mirabellabatik.checkout', $datas);
    }

    public function checkOutNext(Request $request)
    {
        if ( $request->same_address == 'on')
        {
            $alamat = Pelanggan::find(Auth()->user()->id)->alamat;
            $kota_id = Pelanggan::find(Auth()->user()->id)->kota_id;
        } else {
            $this->validate($request, [
                'name' => 'required|min:3|string',
                'alamat' => 'required|min:30|string',
                'kota_id' => 'required|integer|exists:kotas,id',
                'kurir_id' => 'required|integer|exists:kurirs,id'
            ]);

            $alamat = $request->alamat;
            $kota_id = $request->kota_id;
        }

        Order::find(Cookie::get('order_id'))->update([
            'alamat_pengiriman' => $alamat,
            'kota_id' => $kota_id,
            'kurir_id' => $request->kurir_id,
        ]);

        Cookie::queue(Cookie::make('order_id', null, 12000, '/'));
        return redirect('/home/pembelian')->with('success', 'Order berhasil dibuat, silakan konfirmasikan.');
    }

    public function produkDetail(Request $request, Produk $produk)
    {
        $datas['produk'] = $produk;

        return view('mirabellabatik.produkDetail', $datas);
    }

    public function produkOrder(Request $request, Produk $produk)
    { 
        if ( !auth()->guard()->check() )
        return redirect('login')->with('error', 'Please Login!');

        $this->validate($request, [
            'jumlah' => [function($attribute, $value, $fail) use ($request, $produk) {
                $ukuranProduk = UkuranProduk::where('produk_id', '=', $produk->id)->where('ukuran', '=', $request->size)->get()[0];

                if ( $request->jumlah > $ukuranProduk->stok )
                $fail($attribute . " not enough stok");
            }]
        ]);
        
        if ( Cookie::get('order_id') === null || Cookie::get('order_id') === '')
        {
            $orderCreate = Order::create([
                'pelanggan_id' => Auth()->user()->id,
            ]);
    
            $orderId = $orderCreate->id;
            Cookie::queue(Cookie::make('order_id', $orderId, 12000, '/'));

            $orderCreate->save();
        } else {
            $orderId = Cookie::get('order_id');
        }

        OrderDetail::create([
            'order_id' => $orderId,
            'produk_id' => $produk->id,
            'size' => $request->size,
            'color' => $request->color,
            'jumlah' => $request->jumlah
        ])->save();

        return back()->with('success', "{$produk->nama_produk}x{$request->jumlah} ditambahkan");
    }

    
    public function produkOrderKonfirmasi(Order $order)
    {
        $datas['order'] = $order;
        $datas['banks'] = Bank::all();

        return view('mirabellabatik.konfirmasi', $datas);
    }

    public function produkOrderKonfirmasiSave(Request $request, Order $order)
    {
        $this->validate($request, [
            'bank_id' => 'required|numeric|exists:banks,id',
            'nama_pengirim' => 'required|string|min:3|max:50',
            'rek_pengirim' => 'required|numeric|digits_between:8,20',
            'bukti_transfer' => 'required|max:5000|image'
        ]);

        Konfirmasi::create([
            'order_id' => $order->id,
            'pelanggan_id' => Auth()->user()->id,
            'bank_id' => $request->bank_id,
            'nama_pengirim' => $request->nama_pengirim,
            'rek_pengirim' => $request->rek_pengirim,
            'bukti_transfer' => $request->bukti_transfer->getClientOriginalName()
        ])->save();

        Order::find($order->id)->update([
            'status_konfirmasi' => 'menunggu persetujuan',
        ]);

        $request->file('bukti_transfer')->move('asset/imgBuktiTransfer', $request->bukti_transfer->getClientOriginalName());

        return redirect('/home/pembelian')->with('success', 'Berhasil mengkonfirmasi order');
    }

    public function produkOrderDetail(Order $order)
    {
        $datas['order_details'] = OrderDetail::where('order_id', '=', $order->id)->paginate(10);

        return view('mirabellabatik.produkOrderDetail', $datas);
    }

    // untuk cancel beberapa item yang telah diorder
    public function produkOrderDetailCancel(Order $order, OrderDetail $orderdetail)
    {
        $data['namaBarang'] = $orderdetail->produk->nama_produk;

        OrderDetail::find($orderdetail->id)->delete();

        // jika semua item telah dihapus maka order dari tabel order juga akan dihapus
        if ( count(OrderDetail::where('order_id', '=', $order->id)->get()) < 1 )
        {
            Order::find($order->id)->delete();
            return redirect('/home')->with('success', 'Berhasil menghapus item ' . $data['namaBarang'])->withCookie(Cookie::forget('order_id'));
        }

        return back()->with('success', 'Berhasil menghapus item ' . $data['namaBarang']);
    }

    public function pembelian()
    {
        $userId = Auth()->user()->id; 
        $datas['orders'] = Order::where('pelanggan_id', '=', $userId)->whereNotNull('kota_id')->paginate(10);
        
        return view('mirabellabatik.pembelian', $datas);
    }

    public function pembelianHapus(Order $order)
    {
        Order::find($order->id)->delete();
        OrderDetail::where('order_id', '=', $order->id)->delete();

        return back()->with('success', 'Berhasil cancel pembelian ' . $order->id);
    }

    public function terimaBarang(Order $order)
    {
        Order::find($order->id)
        ->update([
            'status_diterima' => 'sudah'
        ]);

        $orderDetails = OrderDetail::where('order_id', '=', $order->id)->get();

        foreach($orderDetails as $orderDetail)
        {
            // kurangi stok dan ukuran produk stok yang sesuai
            Produk::find($orderDetail->produk_id)->decrement('stok', $orderDetail->jumlah);
            Produk::find($orderDetail->produk_id)->increment('dibeli', $orderDetail->jumlah);
            
            UkuranProduk::where('produk_id', '=', $orderDetail->produk_id)->where('ukuran', '=', $orderDetail->size)->decrement('stok', $orderDetail->jumlah);
            UkuranProduk::where('produk_id', '=', $orderDetail->produk_id)->where('ukuran', '=', $orderDetail->size)->increment('terjual', $orderDetail->jumlah);

        }

        return back()->with('success', 'Berhasil konfirmasi terima barang');
    }

    public function about()
    {
        return view('mirabellabatik.about');
    }

    public function developer()
    {
        return view('mirabellabatik.developer');
    }

}
