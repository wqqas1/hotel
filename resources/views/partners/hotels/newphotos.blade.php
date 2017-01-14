@extends('layouts.app')
@section('content')
    <h1> Add a photo</h1>

    <form action="/{{$hotel->id}}/photos" method="POST" class="dropzone">
  {{ csrf_field()}}
    </form>
    <hr />
    <a href="/yourhotels/edit/{{$hotel->id}}" class="btn btn-primary">Back</a>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@endsection
