@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-6">
        <a href="/admin/home/kategori/tambah" class="btn btn-primary btn-xs mr-auto"><b>+</b> Add kategori</a>
        <form action="/admin/home/kategori/cari" method='get' class='ml-auto'>
            <input type="text" class="form-control" placeholder="Nama Produk..." name='q' value='{{ old("q")}}'>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis kategori</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->jenis_kategori }}</td>
                        <td class="text-center">
                            <a class='btn btn-info btn-sm' href="/admin/home/kategori/ubah/{{ $kategori->id }}"><span class="fas fa-pen"></span> Edit</a>
                            <a href="/admin/home/kategori/hapus/{{ $kategori->id }}"
                             onclick='return confirm("Hapus kategori {{ $kategori->jenis_kategori }}?!")' 
                             class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> Del</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $kategoris->links() }}
    </div>
</div>

@include('layouts.admin.footer')