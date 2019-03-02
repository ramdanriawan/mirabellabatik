@include('layouts.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-10">
        <div class='table-responsive'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tgl Order</th>
                        <th>Alamat Pengiriman</th>
                        <th>Status Order</th>
                        <th>Status Konfirmasi</th>
                        <th>Status Diterima</th>
                        <th>Kurir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($orders as $order)
                        <tr>
                            <td>
                                <a class='btn btn-default text-info' href="/home/produk/order/detail/{{ $order->id }}"><strong>{{ $order->id }}</strong></a>
                            </td>
                            <td>{{ $order->tgl_order }}</td>
                            <td>{{ $order->alamat_pengiriman }}, {{ $order->kota->nama_kota }}</td>
                            <td>{{ $order->status_order }}</td>
                            <td>{{ $order->status_konfirmasi }} </td>
                            <td>{{ $order->status_diterima }}</td>
                            @if ( $order->resi !== null )
                                <td>{{ $order->kurir->nama_kurir }} <br> <b class='text-secondary'>Resi:</b> {{ $order->resi->resi }}</td>
                            @else 
                                <td>{{ $order->kurir->nama_kurir }} </td>
                            @endif
                            <td class="text-center">
                            @if ( $order->status_diterima == 'sudah' )
                                <a class='btn btn-info btn-sm disabled' href="/home/produk/order/diterima/{{ $order->id }}"><span class="fas fa-check"></span> Sudah Selesai</a>
                            @elseif ( $order->status_konfirmasi == 'disetujui' && $order->status_diterima == 'belum')
                                <a class='btn btn-info btn-sm'  href="/home/produk/order/terimabarang/{{ $order->id }}"
                                onclick='return confirm("yakin barang sudah diterima?")'><span class="fas fa-check"></span> Terima Barang</a>
                            @elseif (  $order->status_konfirmasi == 'menunggu persetujuan' )
                                <a class='btn btn-info btn-sm disabled' href="/home/produk/order/konfirmasi/{{ $order->id }}"><span class="fas fa-check"></span> Menunggu Persetujuan</a>
                                <a href="/home/produk/order/cancel/{{ $order->id }}"
                                onclick='return confirm("Batalkan order {{ $order->id }}?!")' 
                                class="btn btn-danger btn-sm disabled"><span class="fas fa-times"></span> Cancel</a>
                            @else
                                <a class='btn btn-info btn-sm' href="/home/produk/order/konfirmasi/{{ $order->id }}"><span class="fas fa-check"></span> Konfirmasi</a>
                                <a href="/home/produk/order/cancel/{{ $order->id }}"
                                onclick='return confirm("Batalkan order #{{ $order->id }}?!")' 
                                class="btn btn-danger btn-sm"><span class="fas fa-times"></span> Cancel</a>
                            @endif
                            </td>
                        </tr>
                        
                        <div class="modal" tabindex="-1" role="dialog" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                    <form action='' onsubmit='return confirm("Yakin barang sudah diterima?!")'>
                                        <input type='hidden' name='urlTerimaBarang' value='/home/produk/order/terimabarang/{{ $order->id }}' />
                                        <input type='hidden' name='produk_id' value='' />
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                </tbody>
            </table>
        </div>

        {{ $orders->links() }}
    </div>
</div>


@include('layouts.footer')