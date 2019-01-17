@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-6">
        <a href="/admin/home/kota/tambah" class="btn btn-primary btn-xs mr-auto"><b>+</b> Add Kota</a>
        <form action="/admin/home/kota/cari" method='get' class='ml-auto'>
            <input type="text" class="form-control" placeholder="Nama Kota..." name='q' value='{{old("q")}}'>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kota</th>
                    <th>Ongkir</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kotas as $kota)
                    <tr>
                        <td>{{ $kota->id }}</td>
                        <td>{{ $kota->nama_kota }}</td>
                        <td>Rp{{ number_format($kota->ongkir, 2, ',', '.') }}</td>
                        <td class="text-center">
                            <a class='btn btn-info btn-sm' href="/admin/home/kota/ubah/{{ $kota->id }}"><span class="fas fa-pen"></span> Edit</a>
                            <a href="/admin/home/kota/hapus/{{ $kota->id }}"
                             onclick='return confirm("Hapus Kota {{ $kota->nama_kota }}?!")' 
                             class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> Del</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $kotas->links() }}
    </div>
</div>

@include('layouts.admin.footer')