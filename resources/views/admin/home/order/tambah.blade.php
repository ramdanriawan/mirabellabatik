@include('layouts.admin.header')

<div class="container p-5">
    <form class="form-horizontal" role="form" method="POST" action="/admin/home/order/tambah">
    	{{ csrf_field() }}
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Tambah Order</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Pelanggan</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <select name="pelanggan_id" class="form-control" >
                            @foreach($pelanggans as $pelanggan)
                                <option value='{{ $pelanggan->id }}' > {{ $pelanggan->name }} </option>
                            @endforeach 
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('pelanggan_id'))
                                <i class="text-danger"> {{ $errors->first('pelanggan_id') }}</i>
                            @endif
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Tgl Order</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <input type="datetime-local" name="tgl_order" class="form-control" id="name"
                               placeholder="{{ date('Y-m-d\TH:i') }}" required autofocus value='{{ date("Y-m-d\TH:i") }}'>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('tgl_order'))
                                <i class="text-danger"> {{ $errors->first('tgl_order') }}</i>
                            @endif
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Alamat Pengiriman</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <textarea type="number" name="alamat_pengiriman" class="form-control" id="name"
                               placeholder="jl. h. ibrahim rt 19 no 94 kel. rawasari kec. kota baru kota jambi" required autofocus >{{ old("alamat_pengiriman") }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('alamat_pengiriman'))
                                <i class="text-danger"> {{ $errors->first('alamat_pengiriman') }}</i>
                            @endif
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Kota</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <select name="kota_id" class="form-control" >
                            @foreach($kotas as $kota)
                                <option value='{{ $kota->id }}' > {{ $kota->nama_kota }} </option>
                            @endforeach 
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('kota_id'))
                                <i class="text-danger"> {{ $errors->first('kota_id') }}</i>
                            @endif
                        </span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Status Order</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <select name="status_order" class="form-control" >
                            <option value='pending'>Pending</option>
                            <option value='selesai'>Selesai</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('status_order'))
                                <i class="text-danger"> {{ $errors->first('status_order') }}</i>
                            @endif
                        </span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Status Konfirmasi</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <select name="status_konfirmasi" class="form-control" >
                            <option value='pending'>Pending</option>
                            <option value='konfirmasi'>Konfirnasi</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('status_konfirmasi'))
                                <i class="text-danger"> {{ $errors->first('status_konfirmasi') }}</i>
                            @endif
                        </span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Status Diterima</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <select name="status_diterima" class="form-control" >
                            <option value='diterima'>Diterima</option>
                            <option value='transit'>Transit</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if($errors->has('status_diterima'))
                                <i class="text-danger"> {{ $errors->first('status_diterima') }}</i>
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