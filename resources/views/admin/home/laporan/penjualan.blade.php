@include('layouts.laporan.head')
{{-- <body style="background: white;"> --}}
<body style="background: white;" onload='window.print(); window.close();'>
    <div class="container-fluid mt-2">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="printLaporan">
                    <center class='printLaporanTitle'>
                        <h3>
                            <i class="fas fa-building"></i> MIRABELLA BATIK JAMBI
                        </h3>
                        <h4>
                            <i class="fas fa-truck-loading"></i> LAPORAN PENJUALAN
                            </h3>
                            <span>
                                <i class="far fa-calendar-alt"></i> Periode / Tanggal {{ $tggl_mulai }} sd {{ $tggl_akhir }}
                            </span>
                    </center>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">#Order</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Tggl</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Produk</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Harga</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Jumlah</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Total</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">STOK</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Diskon</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_harga = null;
                                $jumlah = null;
                                $total = null;
                            @endphp

                            @foreach ($orders as $order)
                            @foreach( $order->order_detail as $order_detail_produk )
                            <tr>
                                <td>{{ $order_detail_produk->order_id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order_detail_produk->produk->nama_produk }}</td>
                                @php
                                    $harga_setelah_diskon = $order_detail_produk->produk->harga - ($order_detail_produk->produk->harga / 100 *
                                    $order_detail_produk->produk->diskon);
                                @endphp
                                <td>Rp{{ number_format($harga_setelah_diskon, 2, ',', '.')}}</td>
                                <td>{{ $order_detail_produk->jumlah }}</td>
                                <td>Rp{{ number_format($order_detail_produk->jumlah * $harga_setelah_diskon, 2, ',', '.') }}</td>
                                <td>{{ $order_detail_produk->produk->stok }}</td>
                                <td>{{ $order_detail_produk->produk->diskon }}%</td>

                                @php
                                    $total_harga += $harga_setelah_diskon;
                                    $jumlah += $order_detail_produk->jumlah;
                                    $total += $total_harga;
                                @endphp
                            </tr>
                            @endforeach
                            @endforeach
                                <tr>
                                    <td class='no-border'><strong>Total</strong></td>
                                    <td class='no-border'></td>
                                    <td class='no-border'></td>
                                    <td>Rp{{ number_format($total_harga, 2, ',', '.') }}</td>
                                    <td>{{ $jumlah }}</td>
                                    <td>Rp{{ number_format($total, 2, ',', '.') }}</td>
                                    <td class='no-border'></td>
                                    <td class='no-border'></td>
                                </tr>
                        </tbody>
                    </table>
                    @include('layouts.laporan.tandaTangan')
                </div>
            </div>
        </div>
    </div>
