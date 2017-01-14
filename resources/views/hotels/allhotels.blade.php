@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="page-header">
          <h1>Check-In: <small>Find your home, away from home.</small></h1>
      </div>

  @foreach ($hotels as $hotel)
    
    <div class="card">

      <img class="card-img-top" src="{{$hotel->thumbnail->path}}" alt="Card image">

      <div class="card-block">
        <h4 class="card-Title">{{ $hotel->Name}}</h4>
      <p class ="card-text">{{$hotel->description}}</p>
      <a href="/hotels/{{$hotel->id}}" class="btn btn-primary">View</a>
    </div>
  </div>
  @endforeach
</div>
</div>
@endsection
