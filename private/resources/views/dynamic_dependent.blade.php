<!DOCTYPE html>
<html>
<head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
  }
</style>
</head>
<body>
  <br />
  <div class="container box">
   <h3 align="center">Percobaan Dynamic Dropdown</h3><br />
   
   <div><h4>Sifat Bayar</h4></div>
   <div class="form-group">
    <select name="sifat_bayar" id="sifat_bayar" class="form-control input-lg dynamic" data-dependent="jenis_bayar">
     <option value="">Select Sifat Bayar</option>
     @foreach($sifat_bayar_list as $sifat_bayar)
     <option value="{{ $sifat_bayar->sifat_bayar}}">{{ $sifat_bayar->sifat_bayar }}</option>
     @endforeach
   </select>
 </div>
 <br />

 <div><h4>Jenis Bayar</h4></div>
 <div class="form-group">
  <select name="jenis_bayar" id="jenis_bayar" class="form-control input-lg dynamic" data-dependent="nama_bayar">
   <option value="">Select Jenis Bayar</option>
 </select>
</div>
<br />

<div><h4>Nama Bayar</h4></div>
<div class="form-group">
  <select name="nama_bayar" id="nama_bayar" class="form-control input-lg dynamic" data-dependent="syarat">
   <option value="">Select Nama Bayar</option>
 </select>
</div>

<div><h4> Syarat </h4></div>

<div class="form-group">
  <label>
   <input name="syarat" id="syarat" class="form-check-input dynamic" type="checkbox">  
 </label>
</div>


{{ csrf_field() }}
<br />
<br />
</div>
</body>
</html>

<script>
  $(document).ready(function(){

   $('.dynamic').change(function(){
    if($(this).val() != '')
    {
     var select = $(this).attr("id");
     var value = $(this).val();
     var dependent = $(this).data('dependent');
     var _token = $('input[name="_token"]').val();
     $.ajax({
      url:"{{ route('dynamicdependent.fetch') }}",
      method:"POST",
      data:{select:select, value:value, _token:_token, dependent:dependent},
      success:function(result)
      {
       $('#'+dependent).html(result);
     }

   })
   }
 });

   $('#sifat_bayar').change(function(){
    $('#jenis_bayar').val('');
    $('#nama_bayar').val('');
    $('#syarat').val('');
    
    

  });

   $('#jenis_bayar').change(function(){
    $('#nama_bayar').val('');
    $('#syarat').val('');

  });

   $('#nama_bayar').change(function(){
     $('#syarat').val('');

   });
 });


</script>
