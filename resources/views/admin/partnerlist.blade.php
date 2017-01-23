@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="text-center">All Partners</h3>
                <!-- Displays a list of all the partners of Check-In.com and displays a Remove Button next to each -->
                    @foreach ($Partners as $Partner)
                      <li class="list-group-item text-center">
                        {{$Partner->CompanyName}} <a class="btn btn-sm btn-danger pull-right" href="/partners/{{$Partner->id}}/remove">Remove</a>
                      </li>

                    @endforeach

              </div>

              <a href="/home" class="btn btn-info">Back to Dashboard.</a>

          </div>
      </div>
  </div>

@endsection
