@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="page-header">
          <h1>Check-In: <small>Make a Booking</small></h1>

      </div>
        <center>

          <h1>{{$hotel->Name}}</h1>
          <small>{{$hotel->Address}},{{$hotel->City}},{{$hotel->Country}}</small>

      </center>
      <br />
      <center>

          <h2><u>Summary</u></h2>
      </center>
      <br />

      <center>

          <h5>Check-in:</h5><p><b>{{$CheckInStr}} </b></p>


      </center>



      <center>

          <h5>Check-out:</h5><p><b>{{$CheckOutStr}}  </b></p>


      </center>
      <center>

          <h5>Stay:</h5><p>{{$StayDuration}} Nights.</p>  </center>

      <hr />
      <center>

          <h2><u>Your Room: {{$room->RoomType}}</u></h2>
     </center>

      <center>


           <b>Max Occupents:</b><p>{{$room->Capacity}} people. </p>
           <b>Beds Provided:</b><p> {{$room->BedOption}}.</p>
           <b>Room View:</b><p> {{$room->View}}.</p>
           <b>Price Per Night:</b><p> £{{$room->Price}}.</p>

           <p> £{{$room->Price}} x {{$StayDuration}} Nights </p>
           <b class="lead">Total Price: <u>£{{$TotalCost}}</u></b>
      </center>

      <br />
      <hr />

      <form method="POST"  action="/bookings/new/{{$room->id}}/{{$FirstDate}}/{{$SecDate}}/{{$ProtectedCost}}">

        {{ csrf_field()}}


        <center>


          <div class="form-group row">

              <div class="col-xs-6">
                  <label for="first">Guest First Name:</label>
                  <input class="form-control pull-left" name="firstname" id="first" type="text" required="First Name" />
              </div>
              <div class="col-xs-6">
                  <label for="first">Guest Last Name:</label>
                  <input class="form-control pull-right" name="lastname" id="last" type="text" required="Last Name" />
              </div>



          </div>

          <hr />
          <button type="submit" class="btn btn-success">Book Now!</button>
       </center>

     </form>


  </div>

</div>

@endsection
