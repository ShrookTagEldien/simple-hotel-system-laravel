@extends('layouts.app')

@section('sideMenu')
    @include('layouts.adminSideMenu')
  @endsection

  @section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rooms</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" type="button"  data-toggle="modal" data-target="#CreateArticleModal">
              Create Room
          </button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <div class="content">
  <div class="container-fluid">
  <div class="card-body p-2">
    <table id="user" class="display table table-bordered table-striped">
    <thead>
        <tr>
            <th>Number</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Floor_Number</th>
            <th>Manager_Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
  </div>
 </div>
 </div>


 <div class="modal" id="EditArticleModal">
  <div class="modal-dialog-scrollable modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">Room Edit</h4>
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
                  <strong>Success!</strong>Room was updated successfully.
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

<!-- Delete Article Modal -->
<div class="modal" id="DeleteArticleModal">
<div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Delete Room</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <h4  class="sure">Are you sure want to delete this Room?</h4>
            <h4 class=" error">This Room can't be deleted becuase it has a Reservation</h4>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <div  class="hide">
                <button type="button" class="btn btn-danger sure" id="SubmitDeleteArticleForm">Yes</button>
                <button type="button" class="btn btn-default sure" data-dismiss="modal">No</button>
            </div>
                <button type="button" class="btn btn-danger error" data-dismiss="modal" id="ok">OK</button>

        </div>
    </div>
</div>
</div>



<!-- Create Article Modal -->
<div class="modal" id="CreateArticleModal">
<div class="modal-dialog-scrollable modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Room Create</h4>
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
                <strong>Success!</strong>Room was added successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="row">
            <div class="col-6 m-0">
                <div class="form-group">
                    <label for="number"class="text-dark">Room Number:</label>
                    <input type="text" class="form-control" name="number" id="createNumber">
                </div>
                    <div class="form-group">
                    <label for="capacity"class="text-dark">Room Capacity:</label>
                    <input type="text" class="form-control" name="capacity" id="createCapacity">
                </div>
                <div class="form-group">
                    <label for="price"class="text-dark">Room Price:</label>
                    <input type="text" class="form-control" name="price" id="createPrice">
                </div>
            </div>
            <div class="col-6 m-0">
                <div class="form-group">
                    <label for="floor"class="text-dark">Floor Number:</label>
                 
                    <select id="floor" name="floor" class="form-control">
                        @foreach($floors as $floor)
                            <option value="{{$floor['floorId']}}" id="createFloor">{{$floor['floorId']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="manager"class="text-dark">Manager Name:</label>
                  <input type="text" class="form-control" name="manager" id="createManager">
                </div>
                <div class="form-group">
                  <label for="status"class="text-dark">Status:</label>   <br/>
                      <input type="radio" name="status" id="createStatus" value="available" > Available &nbsp;
                      <input type="radio"  name="status" id="createStatus" value="rented"> Rented
                </div>
                
            </div>
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
//  $(function () {
       var table =$(document).ready(function(){
   // var table = $('.yajra-datatable').DataTable({
     var user =$('#user').DataTable({

        processing: true,
        serverSide: true,
        ajax: {
         url: "{{ route('rooms.list') }}",
        },
        columns: [
            {data: 'room_number', name: 'number', searchable: true,},
            {data: 'capacity', name: 'capacity', searchable: true,},
            {data: 'price', name:'price', searchable: true,},
            {data: 'floor_number', name:'floor_number', searchable: true,},
            {data: 'manager_name', name:'manager_name', searchable: true,},
            {data: 'status', name: 'status', searchable: true,},
        
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: true,
            },
        ]


        
    });  



//////////////////////////////////CRUD Operations//////////////////////////////////////

        var edstat; 
        // Get single article in EditModel
        $('.modelClose').on('click', function(){
            $('#EditArticleModal').hide();
        });
        var id;
        $('body').on('click', '#editManagers', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "adminRooms/"+id+"/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#EditArticleModalBody').html(result.html);
                    $('#EditArticleModal').show();
          //      }
         ///   });
      //  });



                 
            $('input[type="radio"]').click(function(){  
                edstat = $(this).val();  
                console.log($(this).val());
                });
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
                url: "adminRooms/"+id,
                method: 'PUT',
                data: {
                        room_number: $('#createNumber').val(),
                        capacity: $('#createCapacity').val(),
                        price: $('#createPrice').val(),
                        floor_number: $('#createFloor').val(),
                        manager_name: $('#createManager').val(),
            //            status: $('#createStatus').val(),
                        status: edstat,
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
            $('.error').hide();
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
                url: "adminRooms/"+id,
                method: 'DELETE',
                success: function(result) {
                    if(!result.failure){
                        setTimeout(function(){ 
                                $('#user').DataTable().ajax.reload();
                                $('#DeleteArticleModal').hide();
                                $('.modal-backdrop.show').hide();
                            }, 1000);
                    }
                    else{
                        $('.error').show();  
                        $('.sure').hide();

                    }
          
                }
            });
        });

        $('#ok').click(function(e){
            $('.sure').show();  
            $('.error').hide();

        });

        var stat;
            $('input[type="radio"]').click(function(){  
                stat = $(this).val();  
                console.log($(this).val());
                });
      // Create article Ajax request.
      $('#SubmitCreateArticleForm').click(function(e) {
           console.log($('#createFloor').val());
                  e.preventDefault();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      url: "adminRooms",
                      method: 'post',
                      data: {
                        room_number: $('#createNumber').val(),
                        capacity: $('#createCapacity').val(),
                        price: $('#createPrice').val(),
                        floor_number: $('#createFloor').val(),
                        manager_name: $('#createManager').val(),

                    //    status: $('#createStatus').val(),

                        status: stat,

                
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