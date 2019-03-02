@if ( auth()->guard()->check() )
    @include('layouts.header')
@else 
    @include('layouts.headerBersih')
@endif

<!-- untuk go to top -->
<div class="go-to-top">
    ^Top
</div>

<div class="container">
    <section class="mt-0">
        <div class="container jumbotron py-0">
            <div class="row position-relative">
                <div class="col-sm-6 img-jumbotron">

                </div>
                <div class="col-sm-6 d-flex justify-content-end p-2">
                    <div>
                        <h1 class="display-4 brand-nhia"><i>Mirabella Batik</i></h1>
                        <h2 class="fts">Fashion, Trendy, Style</h2>
                        <h2 class="mge">Menerima Grosir Dan Ecer</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('layouts.sidebar')
                </div>
                <div class="col-sm-12 col-md-9 semua-produk  text-center my-5">
                    <div class="container mb-4">
                        <h4 class="bg-info p-2 text-white semua-produk-title  mb-3">
                            {{ Request::segment(2) == '' ? 'SEMUA PRODUK' : strtoupper($jenis_kategori) }}
                        </h4>
                        <div class="row pr-4">
                            @foreach($produks as $produk)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid7">
                                    <div class="product-image7">
                                        <a href="#">
                                            <img style="border-radius: 25px; width: 150px; height: 200px;" class="pic-1" src='{{ asset("asset/imgBarang/$produk->gambar") }}'>
                                            <img style="border-radius: 25px; width: 150px; height: 200px;" class="pic-2" src='{{ asset("asset/imgBarang/$produk->gambar_belakang") }}'>
                                        </a>
                                        <ul class="social">
                                            <li><a href="/home/produk/detail/{{$produk->id}}" class="fa fa-eye"></a></li>
                                            <!-- <li><a href="" class="fa fa-shopping-cart"></a></li> -->
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="/home/produk/detail/{{$produk->id}}">{{ $produk->nama_produk }}</a></h3>
                                        <div class="price">Rp{{ number_format($produk->harga - ($produk->harga / 100 * $produk->diskon), 2, ',', '.') }}
                                            @if($produk->diskon > 0 )
                                                <span>Rp{{ number_format($produk->harga, 2, ',', '.') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    {{ $produks->links() }}
                </div>
            </div>
        </div>
    </main>
</div>
@include('layouts.footer')