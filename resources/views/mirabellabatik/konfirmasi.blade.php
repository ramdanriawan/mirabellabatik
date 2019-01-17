@include('layouts.header')

<div class="container  py-5">
    <div class="row  d-flex justify-content-center">
        <div class='col-md-10 offset-md-1'>
            <form class="form-horizontal" role="form" method="POST" action="/home/produk/order/konfirmasi/{{ $order->id }}" enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h2>Konfirmasi</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="name">Bank Tujuan</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                                <select class='form-control' name='bank_id'>
                                    @foreach($banks as $bank)
                                        <option value='{{ $bank->id }}'>{{ $bank->no_rek }}, {{ $bank->nama_bank }}, {{ $bank->atas_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                            <span class="text-danger align-middle">
                                @if($errors->has('bank_id'))
                                    <i class="fa fa-close"> {{ $errors->first('bank_id') }}</i>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="email">Nama Pengirim</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                                <input type="text" name="nama_pengirim" class="form-control" id="email"
                                    placeholder="alex yeo" required autofocus value="{{ old("nama_pengirim") }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                            <span class="text-danger align-middle">
                                @if($errors->has('nama_pengirim'))
                                    <i class="fa fa-close"> {{ $errors->first('nama_pengirim') }}</i>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="email">Rek Pengirim</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                                <input type="number" name="rek_pengirim" class="form-control" id="email"
                                    placeholder="563201026697530" required autofocus value="{{ old("rek_pengirim") }}" minlength='8'>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                            <span class="text-danger align-middle">
                                @if($errors->has('rek_pengirim'))
                                    <i class="fa fa-close"> {{ $errors->first('rek_pengirim') }}</i>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="email">Bukti Transfer</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                                <input type="file" name="bukti_transfer" class="form-control" id="email"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                            <span class="text-danger align-middle">
                                @if($errors->has('bukti_transfer'))
                                    <i class="fa fa-close"> {{ $errors->first('bukti_transfer') }}</i>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success"><i class="fas chevron-right"></i> Kirim</button>
                        <button type="reset" class="btn btn-warning text-white"><i class="fa fa-undo"></i> Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')