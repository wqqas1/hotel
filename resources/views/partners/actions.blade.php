@extends('layouts.app')

@section('content')

<!-- Shows the hotel dashboard allowing the  partner to select what they wish to do.-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hotel Dashboard <a href="/home" class="btn-sm btn-default pull-right">Back</a>
                </div>

                <div class="panel-body">
                  <div class="list-group">
                    <a href="/viewreservations/{{$hotel->id}}" class="list-group-item">View Reservations</a>
                    <a href="/yourhotels/edit/{{$hotel->id}}" class="list-group-item">Edit Hotel</a>
                  </div>
                </div>
              <hr>
            </div>

          </div>

   </div>
</div>

@endsection
