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
        <li  class="nav-item"><a class="nav-link active" data-toggle="tab" href="#approved">Approved</a></li>
        <li  class="nav-item"><a class="nav-link" data-toggle="tab" href="#pending">Pending</a></li>
      </ul>
    
      <div class="tab-content p-4">
        <div id="approved" class="tab-pane fade in active">
       
          <div class="container-fluid">
            <div class="card-body p-2">
              <table id="table_id" class="display table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Country</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
            
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>
                        <a href="clients/1">Client Reservations</a>
                        </td>
            
                    </tr>
                    <tr>
            
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>
                           <a href="clients/1">Client Reservations</a>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
           </div>
           </div>
        <div id="pending" class="tab-pane fade">
          <h3>Menu 1</h3>
          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- /.content-wrapper -->


@endsection
@section('script')

<script>

</script>

@endsection