@extends('layouts.app')

@section('sideMenu')
@include('layouts.receptionistSideMenu')
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3 ">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
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


<div class="modal" id="denyClientModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Deny Client</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <h4>Are you sure want to delete this user?</h4>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="SubmitDenyUserForm">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
@endsection

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

    // Create article Ajax request.
    $('#approveClient').click(function(e) {

      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: 'clients/'+id+'/approve',
        method: 'get',
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
    });

    $.ajax({
      url: 'clients/'+id+'/deny',
      method: 'get',
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

  });
</script>

@endsection