@include('layouts.admin.header')

<div class="container p-5">
    <form class="form-horizontal" role="form" method="POST" action="/admin/home/kota/ubah/{{ $kota->id }}">
    	{{ csrf_field() }}
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Ubah Kota</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Nama</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-city"></i></div>
                        <input type="text" name="nama_kota" class="form-control" id="name"
                               placeholder="Jambi" required autofocus value='{{ $kota->nama_kota }}'>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('nama_kota'))
                                <i class="text-danger"> {{ $errors->first('nama_kota') }}</i>
                            @endif
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Ongkir</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-money-bill-wave"></i></div>
                        <input type="number" name="ongkir" class="form-control" id="email"
                               placeholder="22000" required autofocus value="{{ $kota->ongkir }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('ongkir'))
                                <i class="text-danger"> {{ $errors->first('ongkir') }}</i>
                            @endif
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                <button type="reset" class="btn btn-warning text-white"><i class="fa fa-plus-square"></i> Reset</button>
            </div>
        </div>
    </form>
</div>

@include('layouts.admin.footer')