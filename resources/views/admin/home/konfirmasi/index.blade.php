@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-10">
        {{-- <a href="/admin/home/konfirmasi/tambah" class="btn btn-primary btn-xs mr-auto"><b>+</b> Add konfirmasi</a> --}}
        <form action="/admin/home/konfirmasi/cari" method='get' class='ml-auto mb-2'>
            <input type="text" class="form-control" placeholder="Nama Pengirim..." name='q' value='{{ old("q")}}'>
        </form>

        <div class='table-responsive'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order Id</th>
                        <th>Pelanggan</th>
                        <th>Bank</th>
                        <th>Pengirim</th>
                        <th>Rekening</th>
                        <th>Tggl Konfirmasi</th>
                        <th>Bukti Transfer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konfirmasis as $konfirmasi)
                        <tr>
                            <td>{{ $konfirmasi->id }}</td>
                            <td>{{ $konfirmasi->order_id }}</td>
                            <td>{{ $konfirmasi->pelanggan->name }}</td>
                            <td>{{ $konfirmasi->bank->nama_bank }}</td>
                            <td>{{ $konfirmasi->nama_pengirim }}</td>
                            <td>{{ $konfirmasi->rek_pengirim }}</td>
                            <td>{{ $konfirmasi->tggl_konfirmasi }}</td>
                            <td><a href='{{ asset("asset/imgBuktiTransfer/$konfirmasi->bukti_transfer") }}'><img src='{{ asset("asset/imgBuktiTransfer/$konfirmasi->bukti_transfer") }}' width='200' height='250'/></a></td>
                            <td>
                                @if ( $konfirmasi->order->status_diterima == 'sudah')
                                    <a class='btn btn-info btn-sm disabled'><span class="fas fa-check"></span> Telah Diterima</a>
                                @elseif ( $konfirmasi->order->status_konfirmasi == 'disetujui' )
                                    <a class='btn btn-info btn-sm disabled'><span class="fas fa-check"></span> Telah Disetujui</a>
                                @else
                                    <a class='btn btn-info btn-sm' href="/admin/home/konfirmasi/ubah/{{ $konfirmasi->id }}"
                                    onclick='return confirm("Setujui konfirmasi dari {{ $konfirmasi->pelanggan->name }} ?")'
                                    ><span class="fas fa-check"></span> Setujui</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $konfirmasis->links() }}
    </div>
</div>

@include('layouts.admin.footer')