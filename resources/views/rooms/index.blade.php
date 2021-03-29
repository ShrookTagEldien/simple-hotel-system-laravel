@extends('layouts.app')


@section('title')Index Page @endsection

@section('content')

     <nav class="navbar navbar-dark bg-dark">
        <a href="{{route('rooms.index')}}" class="navbar-brand mb-0 h1">My Reservation</a>
      </nav>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>  
        <th scope="col">room_number</th>
        <th scope="col">capacity</th>
        <th scope="col">price</th>
        
      </tr>
    </thead>
    <tbody>
    @foreach($rooms as $room)
      <tr>
        <th scope="row">{{ $room['id'] }}</th>
        <td>{{ $room['room_num'] }}</td>
        <td>{{ $room['accompany_number'] }}</td>
        <td>{{ $room['paid_price'] }}</td>
        
      </tr>
    @endforeach
    </tbody>
</table>
@endsection


  

 