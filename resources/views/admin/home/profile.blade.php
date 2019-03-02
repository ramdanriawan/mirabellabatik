@include('layouts.admin.header')

<div class="container">
    <div class="row pt-5">
        <div class="col-4 offset-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container d-flex justify-content-center"> 
                                <img src='{{ asset("asset/imgAdmin/$admin->gambar") }}' class='float-left mr-2 rounded-circle' id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                <div class="userData pt-5 pl-3">
                                    <h2 class="d-block text-center" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{ $admin->username }}</a></h2>
                                    <h6 class="d-block text-center"><a href="javascript:void(0)"></a>{{ $admin->name }}</h6>
                                </div>
                            </div>
                            
                            <div class="ml-auto">
                                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row pb-5">
        <div class="col-4 offset-4">
        <strong>Edit Data:</strong>
            <form action='/admin/home/profile/ubah' method='post'>
                @csrf
                <div class='form-group mt-3'>
                    <label for='name'> Name </label>
                    <input class='form-control' name='name' type='text' placeholder='Nama Admin' required minlength='3' maxlength='30' value='{{ $admin->name }}'>
                    @if ( $errors->has("name"))
                        <p>
                            <span class='text-danger'>{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class='form-group'>
                    <label for='password_lama'> Password Lama </label>
                    <input class='form-control' name='password_lama' type='password' placeholder='passowrd lama' required minlength='3' maxlength='30'>
                    @if ( $errors->has("password_lama"))
                        <p>
                            <span class='text-danger'>{{ $errors->first('password_lama') }}</span>
                    @endif
                </div>

                <div class='form-group'>
                    <label for='password'> Password Baru </label>
                    <input class='form-control' name='password' type='password' placeholder='New Password' required minlength='3' maxlength='30'>
                    @if ( $errors->has("password"))
                        <p>
                            <span class='text-danger'>{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class='form-group'>
                    <label for='password_confirmation'> Konfirmasi Password Baru </label>
                    <input class='form-control' name='password_confirmation' type='password' placeholder='Password Confirmation' required minlength='3' maxlength='30'>
                    @if ( $errors->has("password_confirmation"))
                        <p>
                            <span class='text-danger'>{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <div class='form-group'>
                    <button type='submit' class='btn btn-success' value='Save'>
                        <i class='fa fa-save'></i> Save
                    </button>
                    <button type='reset' class='btn btn-warning' value='Reset'>
                        <i class='fa fa fa-redo-alt'></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.admin.footer')