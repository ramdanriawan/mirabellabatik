@include('layouts.admin.header')

<div class="container p-5">
    <div class='row'>
        <div class='col-6 offset-3'>
            <h2>Laporan Penjualan</h2>
            <form method='post' action='/admin/home/laporan/penjualan' target='_penjualan' onsubmit='window.open("", "_penjualan", "width=100");'>
                @csrf
                <div class='form-group'>
                    <label for='tggl_mulai'>Tanggal Mulai</label>
                    <input class='form-control' type='date' name='tggl_mulai' value='{{ old("tggl_mulai") }}' />
                </div>
                <div class='form-group'>
                    <label for='tggl_akhir'>Tanggal Akhir</label>
                    <input class='form-control' type='date' name='tggl_akhir' value='{{ date("Y-m-d") }}' />
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type='submit'>
                        <i class="fa fa-print"></i>
                         Print
                    </button>
                    <button class="btn btn-warning" type='reset'>
                        <i class="fa fa-redo-alt"></i>
                         Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <hr>

    <div class='row'>
        <div class='col-6 offset-3'>
            <h2>Laporan Produk</h2>
            <form method='post' action='/admin/home/laporan/produk' target='_produk' onsubmit='window.open("", "_produk", "width=100");'>
                @csrf
                <div class='form-group'>
                    <label for='tggl_mulai'>Tanggal Mulai</label>
                    <input class='form-control' type='date' name='tggl_mulai' value='{{ old("tggl_mulai") }}' />
                </div>
                <div class='form-group'>
                    <label for='tggl_akhir'>Tanggal Akhir</label>
                    <input class='form-control' type='date' name='tggl_akhir' value='{{ date("Y-m-d") }}' />
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type='submit'>
                        <i class="fa fa-print"></i>
                         Print
                    </button>
                    <button class="btn btn-warning" type='reset'>
                        <i class="fa fa-redo-alt"></i>
                         Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.admin.footer')