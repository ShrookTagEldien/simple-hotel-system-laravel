@extends('layouts.app')

@section('sideMenu')
@include('layouts.clientSideMenu')
@endsection

@section('content')
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