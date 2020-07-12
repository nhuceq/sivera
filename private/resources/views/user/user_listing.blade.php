@extends('layout.layout')

@section('title')
Daftar User Aplikasi MySPP
@endsection

@section ('content') 


<h2><center>Daftar User Aplikasi MySPP</center></h2>

@if(Session::get('error'))
<div class="alert alert-danger">
	{{Session::get('error')}}
</div>
@endif

<table>
	<tr>
		<div class="input-group col-md">
			<form method="get" action="{{url('user_view')}}"> 
				<td>
					<input type="text" value="" class="form-control" name="cari" placeholder="Cari User">				
				</td>

				<td>
					<span class="input-group-btn btn-sm">
						<button type="Submit" class="btn btn-primary btn-sm">
							Cari
						</button>
					</span>
				</td>
			</form> 
		</div>
	</tr>
</table>

<br>


<button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#tambah_user">
	Tambah User
</button>
<br><br>

<!-- Modal Admin - Tambah User -->
<div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form class="modal-content" method="post" action="{{ url('/user_save') }}">
			{{ csrf_field() }} 
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Form Input User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">

						<div class="form-group col-md">
							<label>Username</label>
							<input type="text" class="form-control" placeholder="" name="username" >
						</div>

						<div class="form-group col-md">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control" placeholder="" name="nama_lengkap" >
						</div>


						<div class="form-group col-md">
							<label>Password</label>
							<input type="text" class="form-control" placeholder="" name="password" >
						</div>	
						<div class="form-group col-md">
							<label>Hak Akses</label>
							<select class="form-control" name="hak_akses">
								<option selected>admin</option>
								<option>user_loket</option>
								<option>verifikator1</option>
								<option>verifikator2</option>
								<option>user_biasa</option>
							</select>
						</div>	
					</div>
					<div class="col-md-6">

						<div class="form-group col-md">
							<label>Nomor Handphone</label>
							<input type="text" class="form-control" placeholder="" name="no_hp" >
						</div>	
						<div class="form-group col-md">
							<label>Email</label>
							<input type="text" class="form-control" placeholder="" name="email" >
						</div>	

						<div class="form-group col-md">
							<label>Unit Kerja</label>
							<select class="form-control" name="unit">
								<option selected>Sekretariat I </option>
								<option>Sekretariat II </option>
								<option>Sekretariat III </option>
								<option>PPABP </option>
								<option>Kedeputian I </option>
								<option>KEIN</option>
								<option>Kedeputian II </option>
								<option>Kedeputian III </option>
								<option>EITI </option>
								<option>Kedeputian IV </option>
								<option>E-Commerce </option>
								<option>Kedeputian V </option>
								<option>Kedeputian VI </option>
								<option>KPPIP </option>
								<option>Kedeputian VII </option>
								<option>Setdenas KEK</option>			
							</select>

						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="Submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>




<div class="table-responsive ">
	<table class="table text-nowrap">
		<tr>
			<th>Id</th>
			<th>Username</th>
			<!-- <th>Password</th> -->
			<th>Hak Akses</th>
			<!-- <th>Nomor Handphone</th> -->
			<!-- <th>Email</th> -->
			<th>Unit</th>
			<th>Aksi</th>
		</tr>

		@foreach ($data_user as $user_spp)

		<tr>
			<td>{{ $user_spp->id }}</td>
			<td>{{ $user_spp->username }}</td>
			<!-- <td>{{ $user_spp->password_asli }}</td> -->
			<td>{{ $user_spp->role }}</td>
			<!-- <td>{{ $user_spp->no_hp }}</td> -->
			<!-- <td>{{ $user_spp->email }}</td> -->
			<td>{{ $user_spp->unit }}</td>


			<td>
				<a href="{{ url ('/user_detail/') }}/{{ $user_spp->id }}" class="btn btn-primary btn-sm">
				Detail</a> 

				<a href="{{ url ('/user_detail/') }}/{{ $user_spp->id }}?show_edit" class="btn btn-warning btn-sm">
				Edit</a> 
									
				<button onclick="hapus('{{ $user_spp->id }}')" class="btn btn-danger btn-sm">Hapus</button>	


				

			</td>
		</tr>

		@endforeach

	</table>
</div>

{{ $data_user->links() }}

<script type="text/javascript">
	function hapus(id) {
		if( confirm('Anda yakin menghapus data ini?') ) {
			location.href = "{{ url('user_delete') }}/" + id;
		}
		else {

		}
	}
</script>


</body>
</html>
@endsection