@extends('layouts.app')

@section('content')
@unless ($UsersRole->role_id ==2 )


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard  |   You are logged in! {{$UsersRole->RoleName}}</div>

                <div class="panel-body">
                  <div class="list-group">
                    <a href="/search" class="list-group-item">Make a Booking</a>
                    <a href="/user/reservations" class="list-group-item">View Your Bookings</a>
                </div>
            </div>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">Want to Partner with Check-in.com?</div>

                <div class="panel-body">
                  <div class="list-group">
                    <a href="partner/apply" class="list-group-item">Become a Partner Now!</a>
                    <a href="partner/{{Auth::id()}}/status" class="list-group-item">Check your proposal status</a>
                  </div>

                </div>
            </div>


        </div>

    </div>

</div>

@endsection


@else
  <h1> No Way.</h1>
  @endunless
