@extends('layouts.app')

@section('content')
@unless ($UsersRole->role_id ==2 )

<!-- Displays the Partners Dashboard -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>



                <div class="panel-body">
                    <div class="list-group">
                      <a href="/partners/{{$Partner->id}}/yourhotels" class="list-group-item">Your Hotels</a>
                      <a href="/partners/{{$Partner->id}}/newhotel" class="list-group-item">List a New Hotel</a>
                    @if ($PartnerHotels > 0)


                      <a href="/partners/{{$Partner->id}}/graphs" class="list-group-item">View Hotel Statistics</a>
                    @endif
                    </div>
                </div>
                <div class="panel-footel text-center">
                    Welcome {{$UsersRole->RoleName}} - {{$Partner->CompanyName}} You are logged in!  </div>
            </div>
        </div>
    </div>
</div>
@endsection

@else
  <h1> No Way.</h1>
  @endunless
