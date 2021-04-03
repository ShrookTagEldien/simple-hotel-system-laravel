@extends('layouts.SysApp')

@section('sideMenu')
    @include('layouts.adminSideMenu')
  @endsection


  @section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet"/>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Clints</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <div class="content p-2">

    <div class="container">
      <ul class="nav nav-tabs">
        <li  class="nav-item"><a class="nav-link active" data-toggle="tab" href="#approved">Pending</a></li>
        <li  class="nav-item"><a class="nav-link" data-toggle="tab" href="#pending">ALL</a></li>
      </ul>
    
      <div class="tab-content p-4">
        <div id="approved" class="tab-pane fade in active">
       
          <div class="container-fluid">
            <div class="card-body p-2">
              <table class="table table-bordered datatable">
                <thead>
                  <tr>
                    <th>Client ID</th>
                    <th>Client Name</th>
                    <th>Client Email</th>
                    <th width="150" class="text-center">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
           </div>
           </div>
        <div id="pending" class="tab-pane fade">
          <table class="table table-bordered " id='users'>
            <thead>
              <tr>
                <th>Client ID</th>
                <th>Client Name</th>
                <th>Client Email</th>
              </tr>
            </thead>
          </table> </div>
      </div>
    </div>
  </div>
  </div>

  <!-- /.content-wrapper -->


@endsection
@section('script')

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // init datatable.
    var dataTable = $('.datatable').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      pageLength: 5,
      // scrollX: true,
      "order": [
        [0, "desc"]
      ],
      ajax: '{{route('get-pending')}}',
      columns: [{
          data: 'id',
          name: 'client_id'
        },
        {
          data: 'name',
          name: 'client_name'
        },
        {
          data: 'email',
          name: 'client_email'
        },
        {
          data: 'Actions',
          name: 'Actions',
          orderable: false,
          serachable: false,
          sClass: 'text-center'
        },
      ]
    });
    var id;
    $('body').on('click', '#denyClient', function(e) {
      $('.alert-danger').html('');
      $('.alert-danger').hide();
      id = $(this).data('id');
      $.ajax({
        method: 'GET',
        success: function(result) {
          console.log(result);
          $('#denyClientModal').show();
        }
      });
    });

//////////////approve client
$('body').on('click','#approveClient', function(e) {
  id = $(this).data('id');
  console.log(id);
e.preventDefault();
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  url: "/clients/"+id+"/approve",
  method: 'post',
  success: function(result) {
    if (result.errors) {
      $('.alert-danger').html('');
      $.each(result.errors, function(key, value) {
        $('.alert-danger').show();
        $('.alert-danger').append('<strong><li>' + value + '</li></strong>');
      });
    } else {
      $('.alert-danger').hide();
      $('.alert-success').show();
      $('.datatable').DataTable().ajax.reload();
      setInterval(function() {
        location.reload();
      }, 2000);
    }
  }
});
});

$.ajax({
      url: "/clients/"+id+"/deny",
      method: 'post',
      data: {
        id: id,
      },
      success: function(result) {
        if (result.errors) {
          $('.alert-danger').html('');
          $.each(result.errors, function(key, value) {
            $('.alert-danger').show();
            $('.alert-danger').append('<strong><li>' + value + '</li></strong>');
          });
        } else {
          $('.alert-danger').hide();
          $('.alert-success').show();
          $('.datatable').DataTable().ajax.reload();
          setInterval(function() {
            location.refresh();
          }, 2000);
        }
      }
    });

    $('.modalClose').on('click', function() {
      $('#denyClientModal').hide();
    });


var user =$('#users').DataTable({

processing: true,
serverSide: true,
ajax: {
 url: "{{ route('clients1.list') }}",
},
columns: [
    {data: 'id', name: 'id'},
    {data: 'name', name:'name'},
    {data: 'email', name: 'email'},


]
});


  });
</script>

@endsection