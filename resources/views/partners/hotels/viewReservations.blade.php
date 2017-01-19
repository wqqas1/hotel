@extends('layouts.app')

@section('content')
  <a class="btn btn-default pull-right" href="{{URL::previous()}}">Back</a>
  <div class="row">
    <div class="col-md-6 col-md-offset-3 ">



<h4>Reservations for {{$hotel->Name}}: </h4>

<br />


@foreach ($reservations  as $reservation)





<a class="btn btn-sm btn-danger pull-right" href="/reservations/{{$reservation->id}}/cancel">Cancel</a>
  <h5><u> {{$reservation->room->RoomType}}</u></h5>
  <p><mark>Guest Name :</mark>  {{$reservation->guestFirstName}} {{$reservation->guestlastName}}.  </p>
  <p><mark>Check-in Date :</mark> {{$reservation->CheckIn}}.  </p>
  <p><mark>Check-out Date:</mark> {{$reservation->CheckOut}}.  </p>
  <p><mark>Total Price :</mark> £{{$reservation->totalPrice}}.  </p>

  <hr />
@endforeach

</div>
</div>
@endsection
