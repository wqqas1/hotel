@extends('layouts.app')
@section('content')

  <h3>Add a Hotel</h3>
  <form method="POST" action="hotels/add">
    {{ csrf_field()}}
    <div class="form-group row">
      <label for="namebox" class="col-2 col-form-label">Hotel Name:</label>
      <div class="col-10">

        <input class="form-control" name="Name" type="text" value="" id="namebox">

        </div></div>


      <div class="form-group row">
        <label for="Addressbox" class="col-2 col-form-label">Address:</label>
        <div class="col-10">

          <input class="form-control" name="Address" type="text" value="" id="Addressbox">
      </div></div>

      <div class="form-group row">
        <label for="Citybox" class="col-2 col-form-label">City:</label>
        <div class="col-10">

          <input class="form-control" name="City" type="text" value="" id="Citybox">
      </div></div>

      <div class="form-group row">
        <label for="Countrybox" class="col-2 col-form-label">Country:</label>
        <div class="col-10">

          <input class="form-control" name="Country" type="text" value="" id="Countrybox">
      </div></div>
      <div class="form-group row">
        <label for="Telbox" class="col-2 col-form-label">Telephone:</label>
        <div class="col-10">

          <input class="form-control" name="TelephoneNumber" type="text" value="" id="Telbox">
      </div></div>
      <div class="form-group row">
        <label for="imagebox" class="col-2 col-form-label">Image:</label>
        <div class="col-10">

          <input class="form-control" name="ImagePath" type="text" value="image.jpg" id="imagebox">
      </div></div>

      <div class="form-group row">
        <label for="Descbox" class="col-2 col-form-label">Description:</label>
        <div class="col-10">

          <textarea class="form-control" name="description" type="text" value="" id="Descbox"></textarea>
      </div></div>

      <button type="submit" class="btn btn-primary">Add Hotel</button>
  </form>








@endsection