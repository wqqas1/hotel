@extends('layouts.app')
@section('content')
  <h1>Edit a Room</h1>
  <!--Form for a Partner to edit a room in their hotel -->
  <form method="POST" action="/rooms/{{$room->id}}/edit">
    {{ csrf_field()}}
    {{ method_field('PATCH')}}

    <div class="form-group row">
      <label for="roomtypebox" class="col-2 col-form-label">Room Type:</label>
      <div class="col-10">

        <input class="form-control" name="RoomType" type="text" value="{{$room->RoomType}}"  id="roomtypebox">

      </div>
    </div>

    <div class="form-group row">
      <label for="capacitybox" class="col-2 col-form-label">Capacity:</label>
      <div class="col-10">

        <input class="form-control" name="Capacity" type="text" value="{{$room->Capacity}}"  id="Addressbox">
      </div>
    </div>

    <div class="form-group row">
      <label for="bedsbox" class="col-2 col-form-label">Bed Option:</label>
      <div class="col-10">

        <input class="form-control" name="BedOption" type="text" value="{{$room->BedOption}}" id="bedsbox">
      </div>
    </div>

    <div class="form-group row">
      <label for="pricebox" class="col-2 col-form-label">Price: (£)</label>
      <div class="col-10">

        <input class="form-control" name="Price" type="text" value="{{$room->Price}}" id="pricebox">
      </div>
    </div>

    <div class="form-group row">
      <label for="viewbox" class="col-2 col-form-label">View:</label>
      <div class="col-10">

        <input class="form-control" name="View" type="text" value="{{$room->View}}" id="viewbox">
      </div>
    </div>

    <div class="form-group row">
      <label for="totalroombox" class="col-2 col-form-label">Number of Rooms:</label>
      <div class="col-10">

        <input class="form-control" name="TotalRooms" type="text" value="{{$room->TotalRooms}}" id="totalroombox">
      </div>
    </div>

    <a class="btn btn-default pull-right" href="/yourhotels/edit/{{$room->hotel_id}}">Back</a>
    <button type="submit" class="btn btn-primary">Edit Room</button>

  </form>

@endsection
