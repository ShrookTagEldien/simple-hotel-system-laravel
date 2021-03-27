@extends('layouts.app')

 
  @section('content')
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3 class="p-2">
        <i class="bi bi-person-fill"> Client Name</i><br>
        <i class="bi bi-envelope-fill"> Email</i>
        </h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
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
    <table id="table_id" class="display table table-bordered table-striped">
    <thead>
        <tr>
            <th>room number</th>
            <th>accompany number</th>
            <th>paid price</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 2</td>


        </tr>
        <tr>

            <td>Row 1 Data 2</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 1</td>

        </tr>
    </tbody>
  </table>
  </div>
 </div>
 </div>
  <!-- /.content-wrapper -->


@endsection
