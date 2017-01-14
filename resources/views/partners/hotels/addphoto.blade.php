@extends('layouts.app')
@section('content')
    <h1> Add a photo</h1>

    <form action="/{{$currenthotel->id}}/photos" method="POST" class="dropzone">
  {{ csrf_field()}}
    </form>
    <a href="/home">skip</a>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@endsection
