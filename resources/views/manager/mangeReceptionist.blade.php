@extends('layouts.app')

@section('sideMenu')
    @include('layouts.managerSideMenu')
  @endsection

  <!-- Main Sidebar Container -->
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3 " >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Receptionists</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" type="button"  data-toggle="modal" data-target="#CreateArticleModal">
              Create Receptionist
          </button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  <table class="table table-bordered yajra-datatable" id="user">
    <thead>
        <tr>
            <th>Email</th>
            <th>Username</th>
            <th>National ID</th>
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


  <div class="modal" id="EditArticleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Receptionist Edit</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Receptionist was added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditArticleModalBody">

                </div>
            </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="SubmitEditArticleForm">Update</button>
          <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
<!--Show information of manager-->
<div class="modal" id="ShowArticleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Show Receptionist</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="ShowArticleModalBody">

                </div>
            </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
<!-- Delete Article Modal -->
<div class="modal" id="DeleteArticleModal">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">Receptionist Delete</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
              <h4>Are you sure want to delete this Receptionist?</h4>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="SubmitDeleteArticleForm">Yes</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          </div>
      </div>
  </div>
</div>

<!-- Create Article Modal -->
<div class="modal" id="CreateArticleModal">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">Receptionist Create</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                  <strong>Success!</strong>Receptionist was added successfully.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="text" class="form-control" name="username" id="createUserName">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" id="createEmail">
          </div>
          <div class="form-group">
            <label for="pass">Password:</label>
            <input type="password" class="form-control" name="pass" id="createPassword">
        </div>
          <div class="form-group">
            <label for="nationalid">National ID:</label>
            <input type="text" class="form-control" name="nationalid" id="createNationalID">
        </div>
        <div class="form-group">
            <label for="avatar">Choose Avatar:</label>

                <input id="createAvatar" type="file" class=" @error('avatar') is-invalid @enderror" name="avatar" required>
                @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

        </div>


        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="SubmitCreateArticleForm">Create</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

    var table =$(document).ready(function(){
     var user =$('#user').DataTable({

        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('receptionist.manager.list') }}",
        },
        columns: [
            {data: 'email', name: 'email'},
            {data: 'username', name: 'username'},
            {data: 'NationalID', name:'National ID'},

            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: true,
            },
        ]
    });

//////////////////////////////////CRUD Operations//////////////////////////////////////
     // Get single article in ShowModel
     $('.modelClose').on('click', function(){
            $('#ShowArticleModal').hide();
        });
        var id;
        $('body').on('click', '#showManagers', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "adminReceptions/"+id,
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#ShowArticleModalBody').html(result.html);
                    $('#ShowArticleModal').show();
                }
            });
        });
        // Get single article in EditModel
        $('.modelClose').on('click', function(){
            $('#EditArticleModal').hide();
        });
        var id;
        $('body').on('click', '#editReceptionists', function(e) {
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "adminReceptions/"+id+"/edit",
                method: 'GET',
                success: function(result) {
                    console.log(result);
                    $('#EditArticleModalBody').html(result.html);
                    $('#EditArticleModal').show();
                }
            });
        });


            // Update article Ajax request.
            $('#SubmitEditArticleForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "adminReceptions/"+id,
                method: 'PUT',
                data: {
                    username: $('#editUserName').val(),
                    email: $('#editEmail').val(),
                    NationalID: $('#editNationalID').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#user').DataTable().ajax.reload();
                        setTimeout(function(){
                            $('.alert-success').hide();
                            $('#EditArticleModal').hide();
                        }, 2000);

                    }
                }
            });

        });


       // Delete article Ajax request.
       var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteArticleForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                //url: "receptionist.delete"+id,
                 url: "adminReceptions/"+id,
                method: 'DELETE',
                success: function(result) {
                  setTimeout(function(){
                        $('#user').DataTable().ajax.reload();
                        $('#DeleteArticleModal').hide();
                        $('.modal-backdrop.show').hide();
                    }, 1000);

                }
            });
        });

      // Create article Ajax request.
      $('#SubmitCreateArticleForm').click(function(e) {
                  e.preventDefault();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      url: "adminReceptions",
                      method: 'post',
                      data: {
                        username: $('#createUserName').val(),
                        email: $('#createEmail').val(),
                        NationalID: $('#createNationalID').val(),
                        password: $('#createPassword').val(),
                        avatar: $('#createAvatar').val(),

                      },
                      success: function(result) {
                          if(result.errors) {
                              $('.alert-danger').html('');
                              $.each(result.errors, function(key, value) {
                                  $('.alert-danger').show();
                                  $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                              });
                          } else {
                            $('.alert-danger').hide();
                            $('.alert-success').show();
                            $('#user').DataTable().ajax.reload();
                            setTimeout(function(){
                                console.log('hiding');
                                $('.alert-success').hide();
                                $('#CreateArticleModal').hide();
                                $('.modal-backdrop').hide();
                                //location.reload();
                            }, 2000);
                        }
                    }
                });
            });
    });
</script>
@endsection
