@include('layouts.admin.header')

<div class="container p-5">
    <form class="form-horizontal" role="form" method="POST" action="/admin/home/kategori/ubah/{{ $kategori->id }}">
    	{{ csrf_field() }}
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Ubah Kategori</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Jenis</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <input type="text" name="jenis_kategori" class="form-control" id="name"
                               placeholder="Jumpsuit Batik" required autofocus value='{{ $kategori->jenis_kategori }}'>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('jenis_kategori'))
                                <i class="text-danger"> {{ $errors->first('jenis_kategori') }}</i>
                            @endif
                        </span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                <button type="reset" class="btn btn-warning text-white"><i class="fa fa-plus-square"></i> Reset</button>
            </div>
        </div>
    </form>
</div>

@include('layouts.admin.footer')