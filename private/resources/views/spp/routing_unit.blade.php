<!DOCTYPE html>
<html>
<head>
	<title>Routing/Form Pengajuan Tagihan</title>
</head>
<body>

	<h2 style="text-align:center">FORM PENGAJUAN TAGIHAN</b></h2>

<table>
<thead>
  <tr>
    <td>Nomor Pengajuan</td>
    <td>:</td>
    <td>{{ $spp->id_spp }}</td>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Nomor SPP</td>
    <td>:</td>
    <td>{{ $spp->nomor_spp }}</td>
  </tr>
  <tr>
    <td>Sifat Bayar</td>
    <td>:</td>
    <td>{{ $spp->sifat_bayar }}</td>
  </tr>
  <tr>
    <td>Jenis Belanja</td>
    <td>:</td>
    <td>{{ $spp->jenis_belanja }}</td>
  </tr>
  <tr>
    <td>Jenis Bayar</td>
    <td>:</td>
    <td>{{ $spp->jenis_bayar }}</td>
  </tr>
  <tr>
    <td>Nama Bayar/Kegiatan</td>
    <td>:</td>
    <td>{{ $spp->nama_bayar }}</td>
  </tr> 
  <tr>
    <td>Akun</td>
    <td>:</td>
    <td>{{ $spp->akun }}</td>
  </tr>
   <tr>
    <td>Uraian Kegiatan</td>
    <td>:</td>
    <td>{{ $spp->ket_spp }}</td>
  </tr>

</tbody>
</table>


  <br><br>

<table border="1" width="100%" cellpadding="2" cellspacing="0">
<thead>
  <tr>
    <th rowspan="2" width="3%">No</th>
    <th rowspan="2" width="50%">Nama Dokumen</th>
    <th width="15%">Unit PPK</th>
    <th width="15%">Verifikator</th>
    <th width="15%">PPSPM</th>
  </tr>
  <tr>
    <td><center><b>Checklist</b></center></td>
    <td><center><b>Checklist</b></td>
    <td><center><b>Checklist</b></td>
  </tr>
</thead>
<tbody>
  @foreach($jenis_dok as $n => $dok)
  <tr>
    <td style="text-align:center">{{ $n+1 }}</td>
    <td>{{ $dok->jenis_dok }}</td>
    <td style="text-align:center">{!! isset($dok->is_uploaded) ? '&check;' : '' !!}</td>
    <td></td>
    <td></td>
  </tr>
  @endforeach
</tbody>
</table>

<br>
<br>
<p>
  Yang Mengajukan,
		<br>
		<br>
		<br>
		<br>
	{{ $spp->nama_pj }}
</p>
</body>
</html>