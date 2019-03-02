@include('layouts.admin.header')

<div class="container p-5">
    <form class="form-horizontal" role="form" method="POST" action="/admin/home/resi/tambah/{{ $order->id }}">
    	@csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Tambah resi ({{ $order->kurir->nama_kurir }})</h2>
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
                        <div class="input-group-addon" style="width: 2.6rem"></div>
                        <input type="text" name="resi" class="form-control" id="name"
                               placeholder="No resi" required autofocus value='{{ old("resi") }}'>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('resi'))
                            <i class="text-danger"> {{ $errors->first('resi') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                <button type="reset" class="btn btn-warning text-white"><i class="fa fa-redo-alt"></i> Reset</button>
            </div>
        </div>
    </form>
</div>

@include('layouts.admin.footer')