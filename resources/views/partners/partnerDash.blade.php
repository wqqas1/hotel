@extends('layouts.app')

@section('content')
@unless ($usersrole->role_id ==2 )


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>



                <div class="panel-body">
                    <div class="list-group">
                      <a href="/partners/{{$partner->id}}/yourhotels" class="list-group-item">Your Hotels</a>
                      <a href="/partners/{{$partner->id}}/newhotel" class="list-group-item">List a New Hotel</a>
                      <a href="/partners/{{$partner->id}}/graphs" class="list-group-item">View Hotel Statistics</a>
                    </div>
                  </div>
                  <div class="panel-footel text-center">
                    Welcome {{$usersrole->RoleName}} - {{$partner->CompanyName}} You are logged in!  </div>
            </div>
        </div>
    </div>
</div>
@endsection

@else
  <h1> No Way.</h1>
  @endunless
