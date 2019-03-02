@if ( auth()->guard()->check() )
    @include('layouts.header')
@else 
    @include('layouts.headerBersih')
@endif

<style>
/* FontAwesome for working BootSnippet :> */

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
#team {
    background: #eee !important;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}

section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#team .card {
    border: none;
    background: #ffffff;
}

.image-flip:hover .backside,
.image-flip.hover .backside {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    border-radius: .25rem;
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
}

.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
    margin-bottom: 30px;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}

.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
}

.frontside .card,
.backside .card {
    min-height: 312px;
}

.backside .card a {
    font-size: 18px;
    color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}
</style>

<div class="container mb-0 p-5">
    <div class='row mb-5'>
        <div class="col-xs-12">
            <!-- <h2>About Mirabella Batik Jambi</h2>
            Toko Mirabella Batik Jambi adalah toko yang menjual berbagai macam produk batik khas jambi dengan bahan dasar seperti katun, semi sutra, sutra, atbem dan sanwos. Produk yang dihasilkan berupa pakaian batimk utnuk pria dan wanita. Toko ini berada di Jl. Sultan Agung no. 21 Rt.16/02 Kel. Murni Kec. Telanaipura, Toko ini memiliki 2 cabang yang terletak tidak jauh dari toko utama. Ditoko utama dari Mirabella Batik Jambi memiliki 4 karyawan yang membantu kegiatan operasional sehari-hari.
            Toko ini telah berdiri sejak tahun 1978, dan nama toko tersebut diambil darinama anak dari pemilik toko, yaitu mirabella. toko Mirabella Batik Jambi ini selalu berusaha memberian pelayanan terbaik untuk memberikan kepuasan dan kenyamanan bagi pembeli yang datang ke toko tersebut. -->
        </div>
    </div>

<!-- Team -->
    <section id="team" class="pb-5">
        <div class="container">
            <h5 class="section-title h1">OUR TEAM</h5>
            <div class="row d-flex justify-content-center">
                <!-- Team member -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="{{asset('asset/imgAbout/nhia.jpeg')}}" alt="card image"></p>
                                        <h4 class="card-title">Nhia</h4>
                                        <p class="card-text">Saridania Wiji Setiawati</p>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">Deskrisi</h4>
                                        <p class="card-text">Nama saya saridania wiji setiawati, umur 21 tahun, saya mahasiswi di Stikom DB jambi jurusan sistem informasi, saat ini semester 6. Cita cita saya ingin jadi orang kaya, baik hati, rajin sedekah dan bisa menolong orang lain.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="http://fb.com/">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.instagram.com/_sr.dania">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="https://wa.me/6285367298542">
                                                    <i class="fa fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Team member -->
                <!-- Team member -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="{{asset('asset/imgAbout/novi.png')}}" alt="card image"></p>
                                        <h4 class="card-title">Novi</h4>
                                        <p class="card-text">Noviyanti Ukar</p>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">Deskripsi</h4>
                                        <p class="card-text">Nama saya Noviyanti, umur 22 tahun, saya Mahasiswi STIKOM Dinamika Bangsa Jambi jurusan Sistem Informasi. Cita cita saya menjadi orang yang bermanfaat bagi orang lain.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="http://fb.com/noviyantiukar">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="http://instagram.com/noviyantiukar">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="https://wa.me/6285365551888">
                                                    <i class="fa fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Team member -->

            </div>
        </div>
    </section>
</div>

@include('layouts.footer')