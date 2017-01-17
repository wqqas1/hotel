@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="page-header">
          <h1>Check-In: <small>Make a Booking</small></h1>
      </div>
      <center>

    <h1>{{$hotel->Name}}</h1>
      <small>{{$hotel->Address}},{{$hotel->City}},{{$hotel->Country}}</small>  </center>
      <br />
      <center>

    <h2><u>Summary</u></h2>  </center>
      <br />

        <center>   <h5>Check-in:</h5><p><b>{{$checkInStr}} </b></p> </center>



    <center>     <h5>Check-out:</h5><p><b>{{$checkOutStr}}  </b></p>   </center>
     <center> <h5>Stay:</h5><p>{{$stayduration}} Nights.</p>  </center>

     <hr />
     <center>

   <h2><u>Your Room: {{$room->RoomType}}</u></h2>  </center>
   <center>


   <b>Max Occupents:</b><p>{{$room->Capacity}} people. </p>
   <b>Beds Provided:</b><p> {{$room->BedOption}}.</p>
  <b>Room View:</b><p> {{$room->View}}.</p>
  <b>Price Per Night:</b><p> £{{$room->Price}}.</p>

  <p> £{{$room->Price}} x {{$stayduration}} Nights </p>
  <b class="lead">Total Price: <u>£{{$totalcost}}</u></b><h6>
    <br />
    <a href="#" class="btn btn-success">Book Now!</a>
</center>
</div>
</div>
@endsection
