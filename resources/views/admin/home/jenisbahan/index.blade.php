@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-6">
        <a href="/admin/home/jenisbahan/tambah" class="btn btn-primary btn-xs mr-auto"><b>+</b> Add Jenis Bahan</a>
        <form action="/admin/home/jenisbahan/cari" method='get' class='ml-auto'>
            <input type="text" class="form-control" placeholder="Nama Bahan..." name='q' value='{{ old("q")}}'>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Bahan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisbahans as $jenisbahan)
                    <tr>
                        <td>{{ $jenisbahan->id }}</td>
                        <td>{{ $jenisbahan->nama_bahan }}</td>
                        <td class="text-center">
                            <a class='btn btn-info btn-sm' href="/admin/home/jenisbahan/ubah/{{ $jenisbahan->id }}"><span class="fas fa-pen"></span> Edit</a>
                            <a href="/admin/home/jenisbahan/hapus/{{ $jenisbahan->id }}"
                             onclick='return confirm("Hapus jenisbahan {{ $jenisbahan->nama_bahan }}?!")' 
                             class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> Del</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $jenisbahans->links() }}
    </div>
</div>

@include('layouts.admin.footer')