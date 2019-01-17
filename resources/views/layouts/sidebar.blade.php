<ul class="list-group sidebar mt-3">
    <li class="sidebar-header list-group-item d-flex justify-content-between align-items-center">
        SIDEBAR MENU
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/home" class='text-info'>Semua</a>
        <span class="badge badge-info badge-pill">{{ $kategoris->sum('produk_count') }}</span>
    </li>

    @foreach($kategoris as $kategori)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/home/kategori/{{ $kategori->id }}" class='text-info'>{{ ucwords($kategori->jenis_kategori) }}</a>
        <span class="badge badge-info badge-pill">{{ $kategori->produk_count }}</span>
    </li>
    @endforeach
</ul>

<div class="ads mt-3 p-1 text-center">
    <h2 class="mb-4">Produk Terlaris</h2>
    <p>
    <ul class="list-group">
        @foreach( $produk_terlares as $produk_terlaris)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class='text-info' href='/home/produk/detail/{{ $produk_terlaris->id }}'>{{ $produk_terlaris->nama_produk }}</a>
                <span class="badge badge-info badge-pill">{{ $produk_terlaris->dibeli }}x</span>
            </li>
        @endforeach
    </ul>

</div>