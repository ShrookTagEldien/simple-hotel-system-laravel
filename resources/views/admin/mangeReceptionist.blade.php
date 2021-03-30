@extends('layouts.app')

@section('sideMenu')
    @include('layouts.adminSideMenu')
  @endsection

  <!-- Main Sidebar Container -->
  @section('content')
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Receptionists</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Receptionist</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <div class="content">
  <div class="container-fluid">
  <div class="card-body p-2">

  <table class="table table-bordered yajra-datatable" id="user">
    <thead>
        <tr>
           {{-- <th>No</th> --}}
           {{-- <th>Name</th> --}}
            <th>Email</th>
            <th>Username</th>
            <th>Avatar</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
  </div>
 </div>
 </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
//  $(function () {
       var table= $(document).ready(function(){
   // var table = $('.yajra-datatable').DataTable({
    $('#user').DataTable({

        processing: true,
        serverSide: true,
        //ajax: "{{ route('receptionist.list') }}",
       // ajax: 'admin/receptionists' ,
        ajax: {
         url: "{{ route('receptionist.list') }}",
        },
        columns: [
            {data: 'email', name: 'email'},
            {data: 'username', name: 'username'},
            {data: 'avatar', name:'Avatar'},
            
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true,
            },
        ]
    });  
  });
</script>
@endsection
