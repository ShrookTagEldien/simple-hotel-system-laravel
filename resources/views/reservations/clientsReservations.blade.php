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
            <h1 class="m-0">My Client's Reservations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">MyClients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section style="padding:50px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        {!! $dataTable->tables() !!}
      </div>
    </div>
  </div>

</section>
{!! $dataTable->scripts() !!}
@endsection