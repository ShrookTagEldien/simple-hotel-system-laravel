@extends('layouts.app')

  @section('sideMenu')
    @include('layouts.managerSideMenu')
  @endsection

  @section('content')

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-4">
              <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Average Room Price</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">$ {{ $available }}</p>
                </div>
              </div>
              <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Total number of Floors</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{ $floors }}</p>
                </div>
              </div>
            </div>
            <div class="col-4">

              <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Rented Rooms</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{ $rooms }}</p>
                </div>
         
            </div>

              <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Total number of Reservations</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{ $reservations }}</p>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Total number of Clients</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{ $clients }}</p>
                </div>
              </div>
              <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Available Rooms</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{ $availableRooms }}</p>
                </div>
              </div>
         
            </div>
        </div>      
           
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

  <!-- /.content-wrapper -->


@endsection