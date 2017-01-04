@extends('layouts.app')
@section('content')
  <h1> {{ $hotel->Name}}</h1>
  <h2> {{ $hotel->Country}}</h2>
  <h3> {{ $hotel->Address}}</h3>
  <h3> {{ $hotel->City}}</h3>
  <h3> {{ $hotel->TelephoneNumber}}</h3>


  <h1>Reviews:</h1>
  <ul>


  @foreach ($hotel->reviews as $review)
    <li>

      {{$review->comment}}
    </li>

  @endforeach
</ul>
@endsection
