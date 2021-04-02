<!--
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Pending Clients>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>
<section style="padding-top: 60px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            {!! $dataTable->table() !!}
          </div>
        </div>
      </div>
    </section>

    {!! $dataTable->scripts() !!}

</body>

</html>
-->


@extends('layouts.app')


@section('sideMenu')
    @include('layouts.receptionistSideMenu')
  @endsection
 
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">pending Clients</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">pendingClients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section style="padding-top: 60px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            {!! $dataTable->table() !!}
          </div>
        </div>
      </div>
    </section>

    {!! $dataTable->scripts() !!}

  <!--
  <div class="content">
  <div class="container-fluid">
  <div class="card-body p-2">
    <table id="table_id" class="display table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Gender</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 3</td>
            <td>Row 1 Data 4</td>
            <td>Row 1 Data 5</td>
    
            <td>
            <a class="bi bi-pencil-square pl-2" style="font-size: 1.25rem; color:gray;" href="floors/1/edit"></a>
                <i class="bi bi-trash pl-2" style="font-size: 1.25rem; color:gray;"></i>
            </td>
        </tr>
        <tr>

            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 3</td>
            <td>Row 1 Data 4</td>
            <td>Row 1 Data 5</td>
        
              <td>
              <a class="bi bi-pencil-square pl-2" style="font-size: 1.25rem; color:gray;" href="floors/1/edit"></a>
                <i class="bi bi-trash pl-2" style="font-size: 1.25rem; color:gray;"></i>
            </td>
        </tr>
    </tbody>
  </table>
  </div>
 </div>
 </div>
 -->
  <!-- /.content-wrapper -->


@endsection
