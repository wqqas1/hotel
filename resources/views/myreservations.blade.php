@extends('layouts.app')

@section('content')
  <a class="btn btn-default pull-right" href="/home">Back</a>
  <div class="row">
    <div class="col-md-6 col-md-offset-3 ">



        <h4>My Bookings:</h4>

        <br />
<!-- Loads all of the Current users reservations in a list and displays all  the details -->

        @foreach ($reservations  as $reservation)





        <a class="btn btn-sm btn-danger pull-right" href="/reservations/{{$reservation->id}}/cancel">Cancel</a>
        <a  class="btn btn-sm btn-default pull-right "href="/reservations/{{$reservation->id}}/pdf">Download PDF</a>
          <h5><u> {{$reservation->room->hotel->Name}}</u></h5>
          <p><mark>Room Type :</mark> {{$reservation->room->RoomType}}.  </p>
          <p><mark>Guest Name :</mark>  {{$reservation->guestFirstName}} {{$reservation->guestlastName}}.  </p>
          <p><mark>Check-in Date :</mark> {{$reservation->CheckIn}}.  </p>
          <p><mark>Check-out Date:</mark> {{$reservation->CheckOut}}.  </p>
          <p><mark>Total Price :</mark> £{{$reservation->totalPrice}}.  </p>


          <hr />
        @endforeach

      </div>
    </div>
@endsection
