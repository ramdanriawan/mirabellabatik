@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-10 ">
        <a href="/admin/home/produk/tambah" class="btn btn-primary btn-xs mr-auto"><b>+</b> Add Produk</a>
        <form action="/admin/home/produk/cari" method='get' class='ml-auto'>
            <input type="text" class="form-control" placeholder="Search..." name='q' value='{{old("q")}}'>
        </form>

        <div class='table-responsive w-100'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Jenis Bahan</th>
                        <th>Nama</th>
                        <th>Size</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Berat</th>
                        <th>Gambar</th>
                        <th>Gambar Belakang</th>
                        <th>Di beli</th>
                        <th>Diskon</th>
                        <th>Tggl Masuk</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr> 
                            <td>{{ $produk->id }}</td>
                            <td>{{ $produk->kategori->jenis_kategori }}</td>
                            <td>{{ $produk->jenis_bahan->nama_bahan }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>
                                @foreach ( $produk->ukuran_produks as $ukuran_produk )
                                    {{ $ukuran_produk->ukuran }},
                                @endforeach
                            </td>
                            <td>{{ $produk->deskripsi }}</td>
                            <td>Rp{{ number_format($produk->harga, 2, ',', '.') }}</td>
                            <td>{{ number_format($produk->stok, 0, '', '.') }}</td>
                            <td>{{ $produk->berat }}Kg</td>
                            <td>
                                <img src="{{ asset('asset/imgBarang/' . $produk->gambar) }}" alt='{{ $produk->gambar }}' style='width: 120px; height: 160px;'>
                            </td>
                            <td>
                                <img src="{{ asset('asset/imgBarang/' . $produk->gambar_belakang) }}" alt='{{ $produk->gambar_belakang }}' style='width: 120px; height: 160px;'>
                            </td>
                            <td>
                                {{ number_format($produk->dibeli, 0, '', '.') }}
                            </td>
                            <td>{{ $produk->diskon }}%</td>
                            <td>{{ $produk->tggl_masuk }}</td>
                            <td class="text-center">
                                <a class='btn btn-info btn-sm' href="/admin/home/produk/ubah/{{ $produk->id }}"><span class="fas fa-pen"></span> Edit</a>
                                <a href="/admin/home/produk/hapus/{{ $produk->id }}"
                                onclick='return confirm("Hapus Produk {{ $produk->nama_produk }}?!")' 
                                class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> Del</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $produks->links() }}
    </div>
</div>

@include('layouts.admin.footer')