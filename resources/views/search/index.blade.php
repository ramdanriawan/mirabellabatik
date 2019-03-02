@if ( auth()->guard()->check() )
    @include('layouts.header')
@else 
    @include('layouts.headerBersih')
@endif

<div class="container py-5 px-3">
<div class="row">
	<!-- BEGIN SEARCH RESULT -->
	<div class="col-md-12">
		<div class="grid search">
			<div class="grid-body">
				<div class="row">
					<!-- BEGIN FILTERS -->
					<div class="col-md-3">
						<form action="/home/search/filter" method='post'>
							@csrf 
							<!-- untuk menyimpan nilai dari query -->
							<input type="hidden" name='q' value='{{ Request::get("q") }}'>
							<h2 class="grid-title"><i class="fa fa-filter"></i> Filters</h2>
							<hr>
							
							<!-- BEGIN FILTER BY CATEGORY -->
							<h4>By category:</h4>
							@foreach($kategoris as $kategori)
								<div class="checkbox">
									<label><input type="checkbox" class="icheck" name='kategori_id[]' value='{{ $kategori->id }}'> {{ $kategori->jenis_kategori }}</label>
								</div>
							@endforeach
							<!-- END FILTER BY CATEGORY -->
							
							<div class="padding mt-3"></div>
							
							<!-- BEGIN FILTER BY PRICE -->
							<h4>By price:</h4>
							<div class="slider-primary">
								From
								<input type="number" name='between_price_from' placeholder='1000' min='1000' class='form-control' required value='1000'>
								To 
								<input type="number" name='between_price_to' placeholder='200000' min='1000' class='form-control' required value='1000000'>
							</div>
							<!-- END FILTER BY PRICE -->

							<!-- BEGIN FILTER BY NAME -->
							<P>
							<h4>Order By</h4>
							<div class="dropdown">
								<div class="form-group" aria-labelledby="dropdownMenuButton">
									<select name="order_by" class="form-control" required>
										<option value="nama">Nama</option>
										<option value="harga_terendah">Harga Terendah</option>
										<option value="harga_tertinggi">Harga Tertinggi</option>
										<option value="terbaru">Terbaru</option>
										<option value="terlama">Terlama</option>
									</select>
								</div>
							</div>
							<!-- END FILTER BY NAME -->

							<p>
							<div>
								<button type='submit' class='btn btn-outline-primary btn-lg btn-block'>
									Order 
								</button>
							</div>
						</form>
					</div>
					<!-- END FILTERS -->
					<!-- BEGIN RESULT -->
					<div class="col-md-9">
						<h2><i class="fa fa-file-o"></i> Result</h2>
						<hr>
						
						<!-- END SEARCH INPUT -->
						<p>Showing all results matching "{{ Request::get('q') }}"</p>
						
						<div class="padding"></div>
						
						<div class="row">
							<!-- BEGIN ORDER RESULT -->
							<div class="col-sm-6">
								
							</div>
							<!-- END ORDER RESULT -->
							
							<div class="col-md-6 text-right">
								
							</div>
						</div>
						
						<!-- BEGIN TABLE RESULT -->
						<div class="table-responsive">
							<table class="table table-hover">
								<tbody>
								@foreach($produks as $produk)
									<tr>
										<td class="number text-center"></td>
										<td class="image"><img src='{{ asset("asset/imgBarang/$produk->gambar") }}' alt=""></td>
										<td class="product"><a href="/home/produk/detail/{{$produk->id}}" class='text-info'><strong>{{ $produk->nama_produk }}</strong></a><br>{{ $produk->deskripsi }}</td>
										@php
											$harga_setelah_diskon = $produk->harga - ($produk->harga / 100 * $produk->diskon);
										@endphp
										<td class="price text-right">Rp{{ number_format($harga_setelah_diskon, 2, ',', '.') }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- END TABLE RESULT -->
						
						<!-- BEGIN PAGINATION -->
						<div class="row mb-3 mr-3">
                        <div class="col-12">
                            <nav aria-label="Page navigation example">
                                {{ $produks->appends(['q' => Request::get('q')])->links() }}
                            </nav>
                    
                        </div>
                    </div>
						<!-- END PAGINATION -->
					</div>
					<!-- END RESULT -->
				</div>
			</div>
		</div>
	</div>
	<!-- END SEARCH RESULT -->
</div>
</div>
@include('layouts.footer')