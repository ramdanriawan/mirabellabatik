@include('layouts.header')
<div class="container p-5">
      <div class="row px-5">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{ count($order_details->toArray()) }}</span>
          </h4>
          <ul class="list-group mb-3">
          @php 
            $total_harga = null;
          @endphp

          @foreach($order_details as $order_detail)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{ $order_detail->produk->nama_produk }}x{{ $order_detail->jumlah }}</h6>
                
                <small class="text-muted">{{ $order_detail->produk->deskripsi }}</small>

                <p>
                <a href='/home/produk/order/detail/{{ $order_detail->order->id }}/{{ $order_detail->id }}/cancel'
                  onclick='return confirm("Yakin akan menghapus item {{ $order_detail->produk->nama_produk }}x{{ $order_detail->jumlah }} ?!")'
                > 
                  <b class='text-danger'><small>Remove</small></b> 
                </a>
              </div>
              <span class="text-muted">Rp{{ number_format(($order_detail->produk->harga - ($order_detail->produk->harga / 100) * $order_detail->produk->diskon) * $order_detail->jumlah, 2, '.', ',') }}</span>
            </li>

            @php $total_harga += ($order_detail->produk->harga - ($order_detail->produk->harga / 100) * $order_detail->produk->diskon)  * $order_detail->jumlah; @endphp
            @endforeach;

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"></h6>
                <small class="text-muted"><strong>Total</strong></small>
              </div>
              <strong class='text-success'>Rp{{ number_format($total_harga, 2, ',', '.') }}</strong>
            </li>
          </ul>

        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Alamat Tujuan</h4>
          <form class="needs-validation" method='post'>
          @csrf
          <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name='same_address' class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Alamat tujuan sama dengan profile alamat</label>
            </div>

            <hr class='mb-4'>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nama Penerima </label>
                <input name='name' type="text" class="form-control" id="firstName" placeholder="" value="">
                <p class="text-danger">
                  @if ( $errors->has('name') )
                    <strong>{{ $errors->first('name')}}</strong>
                  @endif
                </p>
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Alamat</label>
              <textarea class='form-control' name='alamat'></textarea>
              <p class="text-danger">
                  @if ( $errors->has('alamat') )
                    <strong>{{ $errors->first('alamat')}}</strong>
                  @endif
                </p>
            </div>

            <div class="row">
             
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" name='kota_id'>
                  <option value="">Choose...</option>
                  @foreach($kotas as $kota)
                    <option value='{{ $kota->id }}'>{{ $kota->nama_kota }}</option>
                  @endforeach
                </select>
                <p class="text-danger">
                  @if ( $errors->has('kota_id') )
                    <strong>{{ $errors->first('kota_id')}}</strong>
                  @endif
                </p>
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label for="state">Kurir</label>
              <select class="form-control" id="state" required name='kurir_id' style='margin-right: -10px'>
                <option value="">Choose...</option>
                @foreach($kurirs as $kurir)
                  <option value='{{ $kurir->id }}'>{{ $kurir->nama_kurir }}</option>
                @endforeach
              </select>
              <p class="text-danger">
                  @if ( $errors->has('kurir_id') )
                    <strong>{{ $errors->first('kurir_id')}}</strong>
                  @endif
                </p>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Next Step</button>
          </form>
        </div>
      </div>

    </div>

@include('layouts.footer')