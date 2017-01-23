@extends('layouts.app')
@section('content')


<h3>Edit a Hotel<a class="btn btn-default pull-right" href="/yourhotels/{{$hotel->id}}/dashboard">Back</a></h3>
<form method="POST" action="/yourhotels/edit/{{$hotel->id}}" enctype="multipart/form-data">
  {{ csrf_field()}}
  {{ method_field('PATCH')}}

    <div class="form-group row">
      <label for="namebox" class="col-2 col-form-label">Hotel Name:</label>
      <div class="col-10">

        <input class="form-control" name="Name" type="text" value="{{$hotel->Name}}" id="namebox">

      </div>
    </div>


    <div class="form-group row">
      <label for="Addressbox" class="col-2 col-form-label">Address:</label>
      <div class="col-10">

        <input class="form-control" name="Address" type="text" value="{{$hotel->Address}}" id="Addressbox">
      </div>
    </div>

    <div class="form-group row">
      <label for="Citybox" class="col-2 col-form-label">City:</label>
      <div class="col-10">

        <input class="form-control" name="City" type="text" value="{{$hotel->City}}" id="Citybox">
      </div>
    </div>

    <div class="form-group row">
      <label for="Countrybox" class="col-2 col-form-label">Country:</label>
      <div class="col-10">

        <input class="form-control" name="Country" type="text" value="{{$hotel->Country}}" id="Countrybox">
      </div>
    </div>

    <div class="form-group row">
      <label for="Telbox" class="col-2 col-form-label">Telephone:</label>
      <div class="col-10">

        <input class="form-control" name="TelephoneNumber" type="text" value="{{$hotel->TelephoneNumber}}" id="Telbox">
      </div>
    </div>

    <div class="form-group row">
        <input type="hidden" value="imag.jpg" name="ImagePath" />
        <label for="imagebox" class="col-2 col-form-label">Thumbnail:</label>
          <p>Current Thumbnail: {{$hotel->thumbnail->path}}</p>
        <div class="col-10">

        <input  name="displaypic" type="file" value="{{$hotel->thumbnail->path}}" id="imagebox">
      </div>
    </div>

    <div class="form-group row">
      <label for="Descbox" class="col-2 col-form-label">Description:</label>
      <div class="col-10">

        <input class="form-control" name="description" type="text" value="{{$hotel->description}}" id="Descbox">
     </div>
   </div>

   <button type="submit" class="btn btn-primary">Edit Hotel</button>
   <a class="btn btn btn-danger pull-right" href="/yourhotels/destroy/{{$hotel->id}}">Remove</a>
</form>
<hr>

  <!-- Change the rooms provided at the hotel -->
  <h2>Rooms:</h2>

<table class="table">

    <thead>
      <tr>
      <th>Type</th>
      <th></th>
      <th></th>
      </tr>
    </thead>
    <tbody>


      @foreach ($hotel->rooms as $room)

        <tr>
          <td><a class="" href="#">{{$room->RoomType}}:</a></td>
          <td></td>

          <td><a class="btn btn-default pull-right" href="/rooms/{{$room->id}}/edit">Edit Room</a></td>
          <td><a class="btn btn-danger pull-right" href="/rooms/{{$room->id}}/discard">Delete Room</a></td>

        </tr>

      @endforeach
    </tbody>
</table>
<hr>
<!-- Adding a new Room -->
<h3>Add a New Room</h3>
<form method="POST" action="/yourhotels/{{$hotel->id}}/rooms">
  {{ csrf_field()}}
  <div class="form-group row">
      <label for="roomtypebox" class="col-2 col-form-label">Room Type:</label>
    <div class="col-10">

      <input class="form-control" name="RoomType" type="text"  id="roomtypebox">

    </div>
  </div>


  <div class="form-group row">
      <label for="capacitybox" class="col-2 col-form-label">Capacity:</label>
    <div class="col-10">

      <input class="form-control" name="Capacity" type="text"  id="Addressbox">
    </div>
  </div>

  <div class="form-group row">
      <label for="bedsbox" class="col-2 col-form-label">Bed Option:</label>
    <div class="col-10">

      <input class="form-control" name="BedOption" type="text"  id="bedsbox">
    </div>
  </div>

  <div class="form-group row">
      <label for="pricebox" class="col-2 col-form-label">Price: (£)</label>
    <div class="col-10">

      <input class="form-control" name="Price" type="text"  id="pricebox">
    </div>
  </div>

  <div class="form-group row">
      <label for="viewbox" class="col-2 col-form-label">View:</label>
    <div class="col-10">

      <input class="form-control" name="View" type="text"  id="viewbox">
    </div>
  </div>

  <div class="form-group row">
      <label for="totalroombox" class="col-2 col-form-label">Number of Rooms:</label>
    <div class="col-10">

      <input class="form-control" name="TotalRooms" type="text"  id="totalroombox">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Add Room</button>

</form>
<!-- End Adding a New room -->
<!-- Add Photos, View  and Delete Photos -->
<hr>
<h1>Photos:</h1>
@foreach ($hotel->photos as $photo)
  <img class="img-thumbnail"src="{{$photo->path}}" />
  <a class="btn btn btn-danger pull-right text-center" href="/{{$hotel->id}}/{{$photo->id}}/destroy">Delete</a>

@endforeach
  <hr />
  <a href="/{{$hotel->id}}/photos" class="btn btn-primary">Add Images</a>




@endsection
