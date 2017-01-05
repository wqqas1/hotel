@if ($review->user_id == Auth::id())
  @extends('layouts.app')


@section('content')

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
@endsection
  @else <h1>Unauthorised Access , You cannot edit this comment!</h1>

@endif
