@extends('layouts.app')


@section('title')Available Rooms @endsection

@section('content')
    <section style="padding-top: 60px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            {!! $dataTable->table() !!}
          </div>
        </div>
      </div>
    </section>
    
@endsection


  

 