@extends('layouts.app')
@section('content')
@if (is_null($user->proposals))

  <p>
    {{$user->Name}} you have no pending proposals.
  </p>



        @elseif ($user->user_id = $user->proposals->user_id )

          <p>
              {{$user->name}} -  You're proposal is currently being reviewed , we aim to get back to you shortly.
          </p>



        @endif

 <a href="/home" class="btn">Back to Dashboard.</a>

@endsection
