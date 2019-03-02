@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-10">
        {{-- <a href="/admin/home/pelanggan/tambah" class="btn btn-primary btn-xs mr-auto"><b>+</b> Add Pelanggan</a> --}}
        <form action="/admin/home/pelanggan/cari" method='get' class='ml-auto mb-2'>
            <input type="text" class="form-control" placeholder="Nama Pelanggan..." name='q' value='{{ old("q")}}'>
        </form>

        <div class='table-responsive'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Telpon</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $pelanggan)
                        <tr>
                            <td>{{ $pelanggan->id }}</td>
                            <td>{{ $pelanggan->name }}</td>
                            <td>{{ $pelanggan->telpon }}</td>
                            <td>{{ $pelanggan->alamat }}</td>
                            <td>{{ $pelanggan->kota->nama_kota }}</td>
                            <td>{{ $pelanggan->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $pelanggans->links() }}
    </div>
</div>

@include('layouts.admin.footer')