<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ol Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

    <!-- own -->
    <link rel='stylesheet' href='{{ asset("asset/css/app.css") }}'>
    <script src="{{ asset('asset/js/app.js') }}"></script>

    <!-- font judul -->
    <link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">

    <!-- fts -->
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">

    <!-- font mge -->
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">

        <!-- sweetalert 2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
</head>
<body>

@include('layouts.partials.success')
@include('layouts.partials.errors')

<div class="container position-relative">
    <header class="">
        <div class="bg-white container p-2">
            <div class="row">
                <div class="col-sm-6 pl-4">
                    <h2 class="brand-nhia"><a href='/'>Mirabella Batik</a></h2>
                </div>
                <div class="col-item-troll col-sm-6 pr-4 d-sm-flex justify-content-end">
                    <!-- <div class="item-troll">
                        <div class="item-troll-desc text-info">
                            User &nbsp; : Guest <br>
                            Items : 0 Items <br>
                            Biaya : Rp.0
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </header>
    
</div>

<!-- navbar menu (class navbar-menu dipake dijquery) -->
<nav class="navbar-menu container navbar navbar-expand-lg navbar-light bg-info sticky-top position-sticky-top">
    <span></span>
    <button class="navbar-toggler bg-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id='navbarSupportedContent'>
        <ul class="navbar-nav w-100 d-flex justify-content-between">
        <li class="nav-item active ml-3">
                <a class="nav-link" href="/home">Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a href="/about" class="nav-link">Profile Toko</a>
            </li>
            <li class="nav-item mr-3">
                <form class="form-inline d-flex justify-content-center" action="/home/search">
                    <div class="form-group form-pencarian">
                        <input class="form-control form-control-sm mt-1" type="search" name="q" placeholder="Search" aria-label="Search" value='{{ Request::get("q") }}'>
                        <button class="btn btn-outline-light ml-1 btn-sm mt-2" type="submit">
                            <i class="fas fa-search fa-xs"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
        
    </div>
</nav>