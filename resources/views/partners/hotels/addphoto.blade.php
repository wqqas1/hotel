@extends('layouts.app')
@section('content')
  <!-- A Drop Upload Container , where the user can Drop photos During the creation of a hotel  which will be uploaded to a hotel -->
  <h1> Add a photo</h1>

  <form action="/{{$CurrentHotel->id}}/photos" method="POST" class="dropzone">
      {{ csrf_field()}}
  </form>
  <a href="/home" class="btn btn-primary">Next</a>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@endsection
