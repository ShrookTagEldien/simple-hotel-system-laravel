@extends('layouts.app')

@section('title')Create Page @endsection

@section('content')
<form method="POST" action="{{route('rooms.store')}}">
    @csrf
    <div class="form-group">
    <div class="card">
    <div class="card-header">
      Room Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Room_Number:</h5>
      <p class="card-text">{{ $room['room_number'] }}</p>
      <h5 class="card-title">Capacity:</h5>
      <p class="card-text">{{ $room['capacity'] }}</p>
      <h5 class="card-title">Status:</h5>
      <p class="card-text">{{ $room['status'] }}</p>
      <h5 class="card-title">Price:</h5>
      <p class="card-text">{{ $room['price'] }}</p>
    </div>
</div>
      
    </div>
    <div class="form-group">
      <label for="description">number of accompany</label>
      <input type="text" class="form-control" id="number of accompany" aria-describedby="emailHelp">
    </div>
     <a href="{{ route('room.create') }}" class="btn btn-info mb-2">add</a>
    <button type="submit" class="btn btn-success mb-2">check out</button>
  </form>

@endsection