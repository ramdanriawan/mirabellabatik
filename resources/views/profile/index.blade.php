@include('layouts.header')

<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container"> 
                                    <img src='{{ asset("asset/imgProfile/" . Auth()->user()->gambar) }}' class='float-left mr-2' id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="userData ">
                                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{ $pelanggan->name }}</a></h2>
                                        <h6 class="d-block"><a href="javascript:void(0)"></a>{{ $pelanggan->telpon }}</h6>
                                    </div>
                                    <div class="middle pt-1" style='clear:both;'>
                                        <form action="/home/profile/changephoto" method='post' enctype='multipart/form-data'>
                                            @csrf
                                            <div class="input-group mt-1" style='width: 38% !important;'>
                                                <div class="custom-file">
                                                    <input name='gambar' type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04"><i class='fas fa-upload'></i></button>
                                                </div>
                                                @if ( $errors->has('gambar') || $errors->has('gambar_nama'))
                                                    <p>
                                                        <span class='text-danger'>{{ $errors->first('gambar') }} {{ $errors->first('gambar_nama') }}</span>
                                                @endif 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
                                    </li> -->
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Alamat</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $pelanggan->alamat }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Kota</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $pelanggan->kota->nama_kota }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $pelanggan->email }}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Registrasi Pada</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $pelanggan->created_at }}
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        Facebook, Google, Twitter Account that are connected to this account
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

@include('layouts.footer')