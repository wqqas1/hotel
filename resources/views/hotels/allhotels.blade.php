@extends('layouts.app')

@section('content')

  <h1>All Hotels.</h1>
  @foreach ($hotels as $hotel)

    <div>
      <a href="/hotels/{{$hotel->id}}">{{ $hotel->Name}}</a>
    </div>
  @endforeach
@endsection
