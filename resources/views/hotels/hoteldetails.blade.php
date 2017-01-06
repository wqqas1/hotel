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
    <h3>Rooms:</h3>



    @foreach ($hotel->rooms as $room)


      <h5><u> {{$room->RoomType}}</u></h5>
      <p><mark>Max Occupants :</mark>  {{$room->Capacity}} People.  </p>
      <p><mark>Beds Provided :</mark> {{$room->BedOption}}.  </p>
      <p><mark>View :</mark> {{$room->View}}.  </p>
      <p><mark>Price :</mark> £{{$room->Price}}  </p>

    @endforeach

<hr>
  <h2>Reviews:</h2>

  <table class="table">

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
      @if ($review->user_id == Auth::id())
          <td><a class="btn btn-default pull-right" href="/reviews/{{$review->id}}/edit">Edit Review</a></td>
          <td>

          <a class="btn btn-danger pull-right" href="/reviews/{{$review->id}}/destroy">Delete Review</a></td>

      @else
        <td></td>
        <td></td>
      @endif




    </tr>

  @endforeach
</tbody>
</table>
<hr>
<h3>Add a New Review</h3>
<form method="POST" action="/hotels/{{$hotel->id}}/reviews">
  {{ csrf_field()}}

  <div class="form-group">


    <textarea name="comment" class="form-control">{{ old('comment')}}</textarea>
    </div>
    <div class="form-group">


      <button type="submit" class="btn btn-primary">Add Review</button>
      </div>
</form>
  @if (count($errors))
    <ul>
      @foreach ($errors->all() as $error)
      <div class="list-group">


        <li class="list-group-item list-group-item-action list-group-item-danger">
          {{$error}}
        </li>


      @endforeach
    </ul>
  </div>
  @endif
</div>
</div>

@endsection
