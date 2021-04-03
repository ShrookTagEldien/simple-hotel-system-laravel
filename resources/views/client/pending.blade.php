@extends('layouts.app')

@section('sideMenu')
@include('layouts.clientSideMenu')
@endsection

@section('content')
<div class="container" style="padding: 50px;padding-left:230px">
<div class="card card-success" style="width: 75%;">
  <div class="card-header">
    <h3 class="card-title">Pending Approval</h3>
   
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  <h4>Your account is waiting approval, we will notify you via E-mail one your account is approved.</h4>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection