@include('layouts.admin.header')

<div class="container p-5">
    <form class="form-horizontal" role="form" method="POST" action="/admin/home/produk/tambah" enctype='multipart/form-data'>
    	{{ csrf_field() }}
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Tambah Produk</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Kategori</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa"></i></div>
                        <select name='kategori_id'  class='form-control'>
                            @foreach($kategoris as $kategori)

                            <option value='{{ $kategori->id }}'>{{ $kategori->jenis_kategori }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('kategori_id'))
                            <i class="text-danger"> {{ $errors->first('kategori_id') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Jenis Bahan</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa"></i></div>
                        <select name='jenis_bahan_id' class='form-control'>
                            @foreach($jenis_bahans as $jenis_bahan)

                            <option value='{{ $jenis_bahan->id }}'>{{ $jenis_bahan->nama_bahan }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('kategori_id'))
                            <i class="text-danger"> {{ $errors->first('kategori_id') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Nama Produk</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <input type="text" name="nama_produk" class="form-control" id="email"
                               placeholder="Baju Batik Keren" required autofocus value="{{ old('nama_produk') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('nama_produk'))
                            <i class="text-danger"> {{ $errors->first('nama_produk') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Stok Produk</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="row">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                            <div class="col">
                                <label>Small</label>
                                <input class='form-control' type="number" name="smallStok" min="0" value="{{ old('smallStok') }}" required>
                            </div>
                            <div class="col">
                                <label>Medium</label>
                                <input class='form-control' type="number" name="mediumStok" min="0" value="{{ old('mediumStok') }}" required>
                            </div>
                            <div class="col">
                                <label>Large</label>
                                <input class='form-control' type="number" name="largeStok" min="0" value="{{ old('largeStok') }}" required>
                            </div>
                            <div class="col">
                                <label>Xtra Large</label>
                                <input class='form-control' type="number" name="xtraLargeStok" min="0" value="{{ old('xtraLargeStok') }}" required>
                            </div>
                        </div>

                        <!-- <label>
                            <input type="checkbox" name="ukuran_produk[]" id="email" value='small'> Small &nbsp;
                        </label>
                        <label>
                            <input type="checkbox" name="ukuran_produk[]" id="email" value='medium'> Medium &nbsp;
                        </label>
                        <label>
                            <input type="checkbox" name="ukuran_produk[]" id="email" value='large'> Large &nbsp;
                        </label>
                        <label>
                            <input type="checkbox" name="ukuran_produk[]" id="email" value='xtra large'> Xtra Large &nbsp;
                        </label> -->
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('smallStok') || $errors->has('largeStok') || $errors->has('mediumStok') || $errors->has('xtraLargeStok'))
                            <i class="text-danger"> {{ $errors->first('smallStok') }}</i>
                            <i class="text-danger"> {{ $errors->first('mediumStok') }}</i>
                            <i class="text-danger"> {{ $errors->first('largeStok') }}</i>
                            <i class="text-danger"> {{ $errors->first('xtraLargeStok') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Deskripsi</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <textarea name="deskripsi" class="form-control"
                               placeholder="Deskripsi Untuk Baju Batik Keren" required>{{ old('nama_produk') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('deskripsi'))
                            <i class="text-danger"> {{ $errors->first('deskripsi') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Harga</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <input type="number" name="harga" class="form-control" id="email"
                               placeholder="100000" required value="{{ old('harga') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('harga'))
                            <i class="text-danger"> {{ $errors->first('harga') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Stok</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <input type="number" name="stok" class="form-control" id="email"
                               placeholder="100" required value="{{ old('stok') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('stok'))
                            <i class="text-danger"> {{ $errors->first('stok') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Berat (Kg)</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <input type="number" name="berat" class="form-control" id="email"
                               placeholder="1" required value="{{ old('berat') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('berat'))
                            <i class="text-danger"> {{ $errors->first('berat') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Gambar</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <input type="file" name="gambar" class="form-control" id="email"
                               placeholder="1" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('gambar_nama'))
                            <i class="text-danger"> {{ $errors->first('gambar_nama') }}</i>
                        @endif
                        @if($errors->has('gambar'))
                            <i class="text-danger"> {{ $errors->first('gambar') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Gambar Belakang</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <input type="file" name="gambar_belakang" class="form-control" id="email"
                               placeholder="1" required value="{{ old('gambar_belakang') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('gambar_belakang_nama'))
                            <i class="text-danger"> {{ $errors->first('gambar_nama') }}</i>
                        @endif
                        @if($errors->has('gambar_belakang'))
                            <i class="text-danger"> {{ $errors->first('gambar_belakang') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Diskon (%)</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa "></i></div>
                        <input type="number" name="diskon" class="form-control" id="email"
                               placeholder="1" value="{{ old('diskon') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('diskon'))
                            <i class="text-danger"> {{ $errors->first('diskon') }}</i>
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Tggl Masuk </label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa"></i></div>
                        <input type="datetime-local" name="tggl_masuk" class="form-control" id="email"
                               placeholder="1" required value="{{ date('Y-m-d\TH:i') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        @if($errors->has('tggl_masuk'))
                            <i class="text-danger"> {{ $errors->first('tggl_masuk') }}</i>
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