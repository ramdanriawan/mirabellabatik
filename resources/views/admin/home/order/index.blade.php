@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-10">
        <!-- <a href="/admin/home/order/tambah" class="btn btn-primary btn-xs mr-auto"><b>+</b> Add Order</a> -->
        <form action="/admin/home/order/cari" method='get' class='ml-auto mb-2'>
            <input type="text" class="form-control" placeholder="Nama Pelanggan..." name='q' value='{{ old("q")}}'>
        </form>

        <div class='table-responsive'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Tgl Order</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Status Order</th>
                        <th>Status Kofirmasi</th>
                        <th>Status Diterima</th>
                        <th>Kurir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td><a class='text-info' href='/admin/home/order/detail/{{ $order->id }}'>{{ $order->id }}</a></td>
                            <td>{{ $order->pelanggan->name }}</td>
                            <td>{{ $order->tgl_order }}</td>
                            <td>{{ $order->alamat_pengiriman }}</td>
                            <td>{{ $order->kota->nama_kota }}</td>
                            <td>{{ $order->status_order }}</td>
                            <td>{{ $order->status_konfirmasi }}</td>
                            <td>{{ $order->status_diterima }}</td>
                            @if ( $order->resi !== null )
                                <td>{{ $order->kurir->nama_kurir }} <br> 
                                <b class='text-secondary'>Resi:</b> {{ $order->resi->resi }}
                            @else
                                <td>{{ $order->kurir->nama_kurir }} <br> 
                            @endif

                            @if( $order->status_konfirmasi == 'pending')
                                <td>
                                    <a class='btn btn-info btn-sm' href="/admin/home/order/ubah/{{ $order->id }}"><span class="fas fa-pen"></span> Edit</a>
                                </td>
                            @elseif ( $order->status_diterima === 'sudah' )
                                <td>
                                    <a class='btn btn-info btn-sm disabled' href="/admin/home/order/ubah/{{ $order->id }}" ><span class="fas fa-pen"></span> Edit</a>
                                    <a class='btn btn-info btn-sm disabled' href="/admin/home/resi/tambah/{{ $order->id }}"  ><span class="fas fa-pen"></span> Input Resi</a>
                                </td>

                            @elseif ( $order->resi === null && $order->status_konfirmasi == "menunggu persetujuan")
                                <td>
                                    <a class='btn btn-info btn-sm' href="/admin/home/order/ubah/{{ $order->id }}"><span class="fas fa-pen"></span> Edit</a>
                                </td>

                            @elseif ( $order->resi === null )
                                <td>
                                    <a class='btn btn-info btn-sm' href="/admin/home/order/ubah/{{ $order->id }}"><span class="fas fa-pen"></span> Edit</a>
                                    <a class='btn btn-info btn-sm' href="/admin/home/resi/tambah/{{ $order->id }}"><span class="fas fa-pen"></span> Input Resi</a>
                                </td>
                            @else
                                <td>
                                    <a class='btn btn-info btn-sm' href="/admin/home/order/ubah/{{ $order->id }}"><span class="fas fa-pen"></span> Edit</a>
                                    <a class='btn btn-info btn-sm' href="/admin/home/resi/ubah/{{ $order->resi->id }}"><span class="fas fa-pen"></span> Ubah Resi</a>
                                </td>
                            @endif

                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $orders->links() }}
    </div>
</div>

@include('layouts.admin.footer')