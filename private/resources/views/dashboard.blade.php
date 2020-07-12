@extends ('layout.layout')

@section ('little')
Dashboard
@endsection

@section('content')


<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">Welcome to SIVERA</h1>
		<p class="lead">SISTEM INFORMASI APLIKASI VERIFIKASI DOKUMEN PELAKSANAAN ANGGARAN</b>  </p>
	</div>
</div>

<div class="col-md-3">
	<div class="metric">
		<span class="icon"><i class="fa fa-database"></i></span>
		<p>
			<span class="number">{{ $jml_spp }}</span>
			<span class="title"><a href="{{ url ('/laporan_spp') }}">Data SPP </a></span>
		</p>
	</div>
	
</div>

<div class="col-md-3">
	<div class="metric">
		<span class="icon"><i class="fa fa-bell"></i></span>
		<p>
			<span class="number">{{ $jml_dispen }}</span>
			<span class="title"><a href="{{ url ('/laporan_dispen') }}">Dispensasi SPP</a></span>
		</p>
	</div>
	
</div>



@endsection
