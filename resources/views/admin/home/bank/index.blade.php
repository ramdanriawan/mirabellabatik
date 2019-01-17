@include('layouts.admin.header')

<div class="container  justify-content-center d-flex py-5">
    <div class="row col-md-10">
        <a href="/admin/home/bank/tambah" class="btn btn-primary btn-xs mr-auto"><b>+</b> Add Bank</a>
        <form action="/admin/home/bank/cari" method='get' class='ml-auto'>
            <input type="text" class="form-control" placeholder="Atas Nama..." name='q' value='{{ old("q")}}'>
        </form>

        <div class='table-responsive'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No Rek</th>
                        <th>Nama Bank</th>
                        <th>Atas Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banks as $bank)
                        <tr>
                            <td>{{ $bank->id }}</td>
                            <td>{{ $bank->no_rek }}</td>
                            <td>{{ $bank->nama_bank }}</td>
                            <td>{{ $bank->atas_nama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $banks->links() }}
    </div>
</div>

@include('layouts.admin.footer')