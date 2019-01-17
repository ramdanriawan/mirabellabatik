@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-10">
        <div class='table-responsive'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $total_harga = null;
                    @endphp 

                     @foreach ($order_details as $order_detail)
                        <tr>
                            <td>
                                {{ $order_detail->produk->id }}
                            </td>
                            <td><a class='text-info' href='/home/produk/detail/{{ $order_detail->produk->id }}'>{{ $order_detail->produk->nama_produk }}</a></td>
                            <td>{{ $order_detail->size }}</td>
                            <td>{{ $order_detail->color }}</td>
                            <td>Rp{{ number_format(((($order_detail->produk->harga / 100) - $order_detail->produk->diskon) * 100), 2, ',', '.') }}</td>
                            <td>{{ $order_detail->jumlah }}</td>
                            <td>Rp{{ number_format(((($order_detail->produk->harga / 100) - $order_detail->produk->diskon) * 100) * $order_detail->jumlah, 2, ',', '.') }}</td>

                            @php 
                                $total_harga += ((($order_detail->produk->harga / 100) - $order_detail->produk->diskon) * 100) * $order_detail->jumlah;
                            @endphp
                        </tr>
                    @endforeach 
                        <tr>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>{{ $order_details->sum('jumlah') }}</strong></td>
                            <td>
                                <strong>Rp{{ number_format($total_harga, 2, ',', '.') }}</strong>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@include('layouts.admin.footer')