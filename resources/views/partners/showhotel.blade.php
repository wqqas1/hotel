@extends('layouts.app')
@section('content')
  <div class="panel-body">
<!-- List All the Hotels belonging to the Signed in partner , Linking to the Hotel Dashboard of each Hotel -->
      <div class="list-group">

          @foreach ($Hotels as $Hotel)
            <a href="/yourhotels/{{$Hotel->id}}/dashboard" class="list-group-item">{{$Hotel->Name}}</a>

          @endforeach

      </div>
      <hr>
      <a class="btn btn-default pull-right" href="/home">Back</a>
  </div>

@endsection
