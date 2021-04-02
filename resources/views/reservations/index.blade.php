@extends('layouts.app')

@section('sideMenu')
@include('layouts.clientSideMenu')
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3 ">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Make a Reservation</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <table class="table table-bordered datatable">
      <thead>
        <tr>
          <th>Room Number</th>
          <th>Capacity</th>
          <th>Price</th>
          <th width="150" class="text-center">Action</th>
        </tr>
      </thead>
    </table>
  
</div>
</div>
 </div>


<!-- Make Reservation Modal -->
<div class="modal" id="rentModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Make Reservstion</h4>
        <button type="button" class="close modalClose" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
          <button type="button" class="close modalClose" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
          <strong>Success!</strong>Article was added successfully.
          <button type="button" class="close modalClose" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="form-group">
          <label for="accompanies">Number of Accompanies:</label>
          <input type="number" class="form-control" name="accompanies" id="accompanies" min="1" value="1">

        </div>
      </div>
      <div id="rentModalBody">

      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="confirmRent">Confirm</button>
        <button type="button" class="btn btn-danger modalClose" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
      ajax: '{{route('get-rooms')}}',
      columns: [{
          data: 'room_number',
          name: 'room_number'
        },
        {
          data: 'capacity',
          name: 'capacity'
        },
        {
          data: 'price',
          name: 'price'
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
    $('body').on('click', '#rent', function(e) {
      $('.alert-danger').html('');
      $('.alert-danger').hide();
      id = $(this).data('id');
      $.ajax({
        method: 'GET',
        success: function(result) {
          console.log(result);
          $('#rentModalBody').html(result.html);
          $('#rentModal').show();
        }
      });
    });

    // Create article Ajax request.
    $('#confirmRent').click(function(e) {

      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{ route('reservation.store') }}",
        method: 'post',
        data: {
          accompanies: $('#accompanies').val(),
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
              $('.alert-success').hide();
              $('#rentModal').modal('hide');
              location.replace("{{route('home')}}");
            }, 2000);
          }
        }
      });
    });
    $('.modalClose').on('click', function() {
      $('#rentModal').hide();
    });

  });
</script>

@endsection