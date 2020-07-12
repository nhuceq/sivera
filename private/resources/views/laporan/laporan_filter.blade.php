@extends ('layout.layout')

@section ('little')
Laporan SPP 
@endsection

@section('content')

<!-- <h2><center>Laporan SPP</center></h2> -->




<table>
	<tr>
		<th><h5><b>Cari Berdasarkan PPK<b></h5></th>
			<th>&nbsp; &nbsp; &nbsp;</th>
			<th><h5><b>Cari Berdasarkan Status SPP<b></h5></th>	
				<th>&nbsp; &nbsp; &nbsp;</th>
				<th><h5><b>Cari Berdasarkan Bulan<b></h5></th>	
					<th>&nbsp; &nbsp; &nbsp;</th>
					<th><h5><b>Cari Berdasarkan Tahun<b></h5></th>		
	</tr>
					<tr>
						<div class="input-group col-md">


							<form method="get" action="{{url('/laporan_spp')}}">

								<td>										
									<select class="form-control" name="filter_pj">
										<option selected>Semua</option>
										<option >Sekretariat I (Hergy Cahyono)</option>
										<option >Sekretariat I (Digda MY Yaasin)</option>
										<option >Sekretariat I (Karlina Aucia)</option>
										<option >Sekretariat II (Ipin Triono)</option>
										<option >Sekretariat III (Agung Setyawan)</option>
										<option >Kedeputian I (Dody Kurniawan)</option>
										<option >KEIN (Amar Yasir)</option>
										<option >Kedeputian II (Darto)</option>
										<option >Kedeputian III (M. Aulia P.S)</option>
										<option >EITI (Agus Haryanto)</option>
										<option >Kedeputian IV (Eko Suradi)</option>
										<option >e-Commerce (Kahfi Heriyanto)</option>
										<option >Kedeputian V (Lutfi Mubarok)</option>
										<option >Kedeputian VI (Nurman Rudianto)</option>
										<option >KPPIP (Djoko Wibowo)</option>
										<option >Kedeputian VII (Rendyawan A)</option>
										<option >KEK (Mardi Santoso)</option>			
									</select>	
								</td>
								<td>&nbsp; &nbsp; &nbsp;</td>				
								<td>					
									<select id="inputState" class="form-control" name="filter_status_spp">
										<option selected>Semua</option>
										<option>Upload SPM</option>
										<option>Tolak</option>
										<option>Ganti Nomor</option>
									</select>					
								</td>	
								<td>&nbsp; &nbsp; &nbsp;</td>					
								<td>
									<select type="inputState" class="form-control" placeholder="" name="filter_bulan">
										<option selected>Semua</option>
										<option value="01">Januari</option>
										<option value="02">Februari</option>	
										<option value="03">Maret</option>	
										<option value="04">April</option>	
										<option value="05">Mei</option>	
										<option value="06">Juni</option>	
										<option value="07">Juli</option>	
										<option value="08">Agustus</option>	
										<option value="09">September</option>	
										<option value="10">Oktober</option>	
										<option value="11">November</option>	
										<option value="12">Desember</option>	
									</select>	
								</td>
								<td>&nbsp; &nbsp; &nbsp;</td>				

								<td>
									<select type="inputState" class="form-control" name="filter_tahun">
										<option>Semua</option>						
										<option>2019</option>
										<option>2020</option>
										<option>2021</option>
										<option>2021</option>
										<option>2022</option>
										<option>2023</option>
										<option>2024</option>
										<option>2025</option>
										<option>2026</option>
										<option>2027</option>
										<option>2028</option>
										<option>2029</option>
										<option>2030</option>
									</select>
								</td>	
								<td></td>	<br>
								<td>
									<span class="input-group-btn btn-sm"><button type="Submit" class="btn btn-primary btn-sm">Cari</button></span>					
								</td>

																	
								<td><span><a class="btn btn-primary btn-sm" href="{{ url('laporan_spp?download=true') }}">Export Semua</a></span></td>
							</form>	
						</div>		
					</tr>
				</table>

				<br>

				<div class="table-responsive">
					<table class="table text-nowrap">
						<tr>
							<center>
								<th>No.</th>
								<th>No. SPP</th>
								<th>Tgl SPP</th>
								<th>Jenis</th>
								<th>Penerima Hak</th>
								<th>Unit</th>
								<th>Nilai</th>
								<th>Status</th>
								<th>SP2D</th>
								<th class="no-wrap">Aksi</th> 
							</center>
						</tr>	

						<?php

						 	$page=1;
							if(isset($_GET['page'])) {
							$page = $_GET['page'];
							}
							$i=($page*10)-9;	
						 ?>

						 	
						@foreach ($data_spp as $spp)

						<tr>
							<td>{{ $i }}</td>
							<td>{{ $spp -> nomor_spp }}</td>
							<td>{{ $spp -> tgl_dok_spp }}</td>
							@if( $spp -> mekanisme_cair == 1 )
							<td>LS</td>
							@elseif( $spp -> mekanisme_cair == 2 )
							<td>UP</td>
							@elseif( $spp -> mekanisme_cair == 3 )
							<td>GUP</td>
							@else
							<td>PTUP</td>
							@endif

							@if( $spp -> penerima_hak ==1 )
							<td>Bendahara Pengeluaran</td>
							@else
							<td>Pihak Ketiga</td>	
							@endif


							<td>{{ $spp -> pj }}</td>
							<td>{{ $spp -> nilai_spp }}</td>
							<td>{{ $spp -> status_spp }}</td>
							<td>{{ $spp -> nomor_sp2d }}</td>
							<td class="text-nowrap">					

								@if (Auth::user() -> role == 'user_loket')
								<a href="{{url ('/spp_detail/') }}/{{ $spp -> nomor_spp }}" class="btn btn-info btn-sm" name="detail">Detail</a>

								@elseif (Auth::user() -> role == 'verifikator1')	
								<a href="{{url ('/spp_detail/') }}/{{ $spp -> nomor_spp }}" class="btn btn-info btn-sm">Detail</a>

								@elseif (Auth::user() -> role == 'verifikator2')	
								<a href="{{url ('/spp_detail/') }}/{{ $spp -> nomor_spp }}" class="btn btn-info btn-sm">Detail</a>	

								@elseif (Auth::user() -> role == 'admin')	
								<a href="{{url ('/spp_detail/') }}/{{ $spp -> nomor_spp }}" class="btn btn-info btn-sm">Detail</a>
								

								@elseif (Auth::user() -> role == 'user_biasa')
								<a href="{{url ('/spp_detail/') }}/{{ $spp -> nomor_spp }}" class="btn btn-danger btn-sm">Ditolak</a> 
								<a href="{{url ('/spp_detail/') }}/{{ $spp -> nomor_spp }}" class="btn btn-success btn-sm">Diterima</a> 			
								@endif			

							</td> 
						</tr>
						<?php $i++; ?>
						@endforeach
					</table>
				</div>
				{{ $data_spp->links() }}


				@endsection