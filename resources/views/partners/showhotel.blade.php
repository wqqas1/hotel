@extends('layouts.app')
@section('content')
  <div class="panel-body">
      <div class="list-group">
  @foreach ($hotels as $hotel)
    <a href="/yourhotels/edit/{{$hotel->id}}" class="list-group-item">{{$hotel->Name}}</a>
  @endforeach
</div>
</div>
@endsection
