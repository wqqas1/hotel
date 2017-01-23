
@extends('layouts.app')

<!-- Check to see if the current user posted the review , then display an edit form for the review.-->
@section('content')
@if ($review->user_id == Auth::id())


  <h1>Edit a Review:</h1>

  <form method="POST" action="/reviews/{{$review->id}}">
    {{ csrf_field()}}
    {{ method_field('PATCH')}}
    <div class="form-group">

      <textarea name="comment" class="form-control">{{ $review->comment }}</textarea>
    </div>

    <div class="form-group">

      <a class="btn btn-default pull-right" href="/hotels/{{$review->hotel_id}}">Back</a>
      <button type="submit" class="btn btn-primary">Edit Review</button>
    </div>
  </form>

  @else <h1>Unauthorised Access , You cannot edit this comment!</h1>

@endif
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
@endsection
