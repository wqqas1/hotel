@extends('layouts.app')
@section('content')
  <h1> {{ $hotel->Name}}</h1>
  <h2> {{ $hotel->Country}}</h2>
  <h3> {{ $hotel->Address}}</h3>
  <h3> {{ $hotel->City}}</h3>
  <h3> {{ $hotel->TelephoneNumber}}</h3>


@endsection
