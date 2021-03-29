@extends('layouts.app')


@section('title')Index Page @endsection

@section('content')

<nav class="navbar navbar-dark bg-dark">
        <a href="{{route('rooms.index')}}" class="navbar-brand mb-0 h1">All Availabe Rooms</a>
      </nav>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>  
        <th scope="col">room_number</th>
        <th scope="col">capacity</th>
        <th scope="col">price</th>
        <th scope="col">Action</th>
        
        
      </tr>
    </thead>
    <tbody>
    @foreach($rooms as $room)
      <tr>
        <th scope="row">{{ $room['id'] }}</th>
        <td>{{ $room['room_number'] }}</td>
        <td>{{ $room['capacity'] }}</td>
        <td>{{ $room['price'] }}</td>
        <td> <a href="{{ route('rooms.show',['room' => $room['id']]) }}" class="btn btn-info mb-2">Make Reservation</a></td>
        
        
      </tr>
    @endforeach
    </tbody>
</table>
@endsection


  

 