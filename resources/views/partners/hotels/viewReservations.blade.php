@extends('layouts.app')

@section('content')
  <a class="btn btn-default pull-right" href="/yourhotels/{{$Hotel->id}}/dashboard">Back</a>
  <div class="row">
    <div class="col-md-6 col-md-offset-3 ">


        <!-- Displays all the reservations for a selected hotel and all the reservation details.-->
        <h4>Reservations for {{$Hotel->Name}}: </h4>

        <br />


        @foreach ($Reservations  as $Reservation)





        <a class="btn btn-sm btn-danger pull-right" href="/reservations/{{$Reservation->id}}/cancel">Cancel</a>
          <h5><u>{{$Reservation->room->RoomType}}</u></h5>
          <p><mark>Guest Name :</mark>  {{$Reservation->guestFirstName}} {{$Reservation->guestlastName}}.  </p>
          <p><mark>Check-in Date :</mark> {{$Reservation->CheckIn}}.  </p>
          <p><mark>Check-out Date:</mark> {{$Reservation->CheckOut}}.  </p>
          <p><mark>Total Price :</mark> £{{$Reservation->totalPrice}}.  </p>

          <hr />
        @endforeach

    </div>
</div>
@endsection
