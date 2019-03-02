@extends('layouts.laporan.head')
<body style="background: white;" onload='window.print(); window.close();'>
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="printLaporan">
                    <center class='printLaporanTitle'>
                        <h3>
                            <i class="fas fa-building"></i> MIRABELLA BATIK JAMBI
                        </h3>
                        <h4>
                            <i class="fas fa-truck-loading"></i> LAPORAN PRODUK
                            </h3>
                            <span>
                                <i class="far fa-calendar-alt"></i> Periode / Tanggal {{ date('d-m-Y') }}
                            </span>
                    </center>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">#ID</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Kategori</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Bahan</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Nama</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Harga</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Stok</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Berat</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Dibeli</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Diskon</div>
                                </th>
                                <th style='padding: 0'>
                                    <div class="printLaporanThead">Masuk</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $produk)
                                <tr>
                                    <td>{{ $produk->id }}</td>
                                    <td>{{ $produk->kategori->jenis_kategori }}</td>
                                    <td>{{ $produk->jenis_bahan->nama_bahan }}</td>
                                    <td>{{ $produk->nama_produk }}</td>
                                    @php
                                        $harga_setelah_diskon = $produk->harga - ($produk->harga / 100 * $produk->diskon);
                                    @endphp
                                    <td>Rp{{ number_format($harga_setelah_diskon, 2, ',', '.')}}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>{{ $produk->berat }}Kg</td>
                                    <td>{{ $produk->dibeli }}x</td>
                                    <td>{{ $produk->diskon }}%</td>
                                    <td>{{ $produk->tggl_masuk }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('layouts.laporan.tandaTangan')
                </div>
            </div>
        </div>
    </div>