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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banks as $bank)
                        <tr>
                            <td>{{ $bank->id }}</td>
                            <td>{{ $bank->no_rek }}</td>
                            <td>{{ $bank->nama_bank }}</td>
                            <td>{{ $bank->atas_nama }}</td>
                            <td class="text-center">
                                <a class='btn btn-info btn-sm' href="/admin/home/bank/ubah/{{ $bank->id }}"><span class="fas fa-pen"></span> Edit</a>
                                <a href="/admin/home/bank/hapus/{{ $bank->id }}"
                                onclick='return confirm("Hapus bank {{ $bank->atas_nama }}?!")' 
                                class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> Del</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $banks->links() }}
    </div>
</div>

@include('layouts.admin.footer')