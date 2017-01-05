@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">


  <div class="page-header">

      <h1> {{ $hotel->Name}}</h1>
      <small>{{ $hotel->Country}} |  {{ $hotel->City}}</small>
  </div>
<div class= "panel panel-primary">
  <div class = "panel-heading">
    <h3 class="panel-title">Hotel Details:</h3>
  </div>
  <div class="panel panel-body">
    <h4>Address:</h4>
      <p>
        {{ $hotel->Address}}
      </p>
    <h4>Telephone Number:</h4>
      <p>
        {{ $hotel->TelephoneNumber}}
      </p>
  </div>
</div>

<hr>
  <h2>Reviews:</h2>

  <table class="table table-inverse">

  <thead>
    <tr>
    <th>User</th>
    <th>Comment</th>
    <th></th>
    </tr>
  </thead>
  <tbody>


  @foreach ($hotel->reviews as $review)
    <tr>
      <td><a class="" href="#">{{$review->user->name}}:</a></td>
      <td>{{$review->comment}}</td>
      <td><a class="btn btn-default pull-right" href="/reviews/{{$review->id}}/edit">Edit Review</a></td>

    </tr>

  @endforeach
</tbody>
</table>
<hr>
<h3>Add a New Review</h3>
<form method="POST" action="/hotels/{{$hotel->id}}/reviews">
  {{ csrf_field()}}

  <div class="form-group">


    <textarea name="comment" class="form-control"></textarea>
    </div>
    <div class="form-group">


      <button type="submit" class="btn btn-primary">Add Review</button>
      </div>
</form>
</div>
</div>

@endsection
