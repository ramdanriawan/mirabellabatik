@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-10">
        <form action="/admin/home/ulasan/cari" method='get' class='ml-auto mb-2'>
            <input type="text" class="form-control" placeholder="Isi Ulasan..." name='q' value='{{ old("q")}}'>
        </form>

        <div class='table-responsive'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Produk</th>
                        <th>Isi Ulasan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ulasans as $ulasan)
                        <tr>
                            <td>{{ $ulasan->id }}</td>
                            <td>{{ $ulasan->pelanggan->name }}</td>
                            <td>{{ $ulasan->produk->nama_produk }}</td>
                            <td>{{ $ulasan->isi_ulasan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $ulasans->links() }}
    </div>
</div>

@include('layouts.admin.footer')