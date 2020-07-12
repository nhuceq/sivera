@extends('layout.layout')

@section('title')
User Detail
@endsection

@section('content')
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3>Detail User {{ $data_user -> username }}</h3>   
        <ul class="list-group list-group-flush detail-spp">

          <li class="list-group-item">
            <label>Username </label>
            <span>: {{ $data_user -> username }}</span>
          </li>
          
          <li class="list-group-item">
            <label>Nama Lengkap </label>
            <span>: {{ $data_user -> nama_lengkap }}</span>
          </li>

          <li class="list-group-item">
            <label>Password</label>
            <span>: {{ $data_user -> password_asli }}</span>
          </li>

          <li class="list-group-item">
            <label>Hak Akses</label>
            <span>: {{ $data_user->role }}</span>
          </li> 

          <li class="list-group-item">
           <label>Nomor Handphone</label> 
           <span>: {{ $data_user->no_hp }}</span>                          
         </li>

         <li class="list-group-item">
           <label>Email</label> 
           <span>: {{ $data_user->email }}</span>                          
         </li>  

         <li class="list-group-item">
           <label>Unit</label> 
           <span>: {{ $data_user->unit }}</span>                          
         </li>            
       </ul> 
       @if(Auth::user()->role == 'admin')
       <button type="button" class="btn btn-danger float-left btn-sm" data-toggle="modal" data-target="#edit_user" >Edit</button>
       @endif
     </div>
   </div>
 </div>
</div>

<!-- Modal Admin - Edit User -->
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" method="post" action="{{ url('/user_edit/') }}/{{ $data_user -> id }}">
      {{ csrf_field() }} 
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Edit User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group col-md">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="" name="username" value="{{$data_user -> username}}">
            </div>

            <div class="form-group col-md">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" placeholder="" name="nama_lengkap" value="{{$data_user -> nama_lengkap}}">
            </div>

            <div class="form-group col-md">
              <label>Password</label>
              <input type="text" class="form-control" placeholder="" name="password" value="{{$data_user -> password_asli}}">
            </div>  
            <div class="form-group col-md">
              <label>Hak Akses</label>
              <select class="form-control" name="hak_akses">
                <option value="admin" @if($data_user -> role == "admin") selected @endif>admin</option>
                <option value="user_loket" @if($data_user -> role == "user_loket") selected @endif >user_loket</option>
                <option value="verifikator1" @if($data_user -> role == "verifikator1") selected @endif>verifikator1</option>
                <option value="verifikator2" @if($data_user -> role == "verifikator2") selected @endif>verifikator2</option>
                <option value="user_biasa" @if($data_user -> role == "user_biasa") selected @endif>user_biasa</option>
              </select>
            </div>  
          </div>

          <div class="col-md-6">
            <div class="form-group col-md">
              <label>Nomor Handphone</label>
              <input type="text" class="form-control" placeholder="" name="no_hp" value="{{$data_user -> no_hp}}">
            </div>  
            <div class="form-group col-md">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="" name="email" value="{{$data_user -> email}}" >
            </div>  

            <div class="form-group col-md">
              <label>Unit Kerja</label>
              <select class="form-control" name="unit">
                <option value="Sekretariat I " @if($data_user -> unit == "Sekretariat 1 ") selected @endif>Sekretariat I</option>
                <option value="Sekretariat II " @if($data_user -> unit == "Sekretariat II ") selected @endif>Sekretariat II </option>
                <option value="Sekretariat III " @if($data_user -> unit == "Sekretariat III ") selected @endif>Sekretariat III </option>
                <option value="PPABP " @if($data_user -> unit == "PPABP ") selected @endif>PPABP</option>
                <option value="Kedeputian I " @if($data_user -> unit == "Kedeputian I ") selected @endif>Kedeputian I </option>
                <option value="KEIN " @if($data_user -> unit == "KEIN ") selected @endif>KEIN</option>
                <option value="Kedeputian II " @if($data_user -> unit == "Kedeputian II ") selected @endif>Kedeputian II </option>
                <option value="Kedeputian III " @if($data_user -> unit == "Kedeputian III ") selected @endif>Kedeputian III </option>
                <option value="EITI " @if($data_user -> unit == "EITI ") selected @endif>EITI </option>
                <option value="Kedeputian IV " @if($data_user -> unit == "Kedeputian IV ") selected @endif>Kedeputian IV </option>
                <option value="E-Commerce " @if($data_user -> unit == "E-Commerce ") selected @endif>E-Commerce </option>
                <option value="Kedeputian V " @if($data_user -> unit == "Kedeputian V ") selected @endif>Kedeputian V </option>
                <option value="Kedeputian VI " @if($data_user -> unit == "Kedeputian VI ") selected @endif>Kedeputian VI </option>
                <option value="KPPIP " @if($data_user -> unit == "KPPIP ") selected @endif>KPPIP </option>
                <option value="Kedeputian VII " @if($data_user -> unit == "Kedeputian VII ") selected @endif>Kedeputian VII </option>
                <option value="KEK" @if($data_user -> unit == "KEK") selected @endif>KEK</option>      
              </select>

            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="Submit" class="btn btn-primary">Edit</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('js')

@if(isset($_GET["show_edit"]))
<script type="text/javascript">
  $('#edit_user').modal('show')
  $('#edit_user').on('hide.bs.modal', function () {
    location.href = "{{ url('user_view') }}"
  })
</script>
@endif

@endsection
