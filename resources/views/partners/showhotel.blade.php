@extends('layouts.app')
@section('content')

  @foreach ($hotels as $hotel)
    <li>


    <a href="/yourhotels/edit/{{$hotel->id}}">{{$hotel->Name}}</a>
        </li>
  @endforeach

@endsection
