@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center "><h5>Admin Dashboard</h5></div>
                <div class="list-group">

                <a href="partner/requests" class="list-group-item ">Partner Requests</a>
                <a href="partner/list" class="list-group-item ">View Partners</a>

              </div>
                <div class="panel-body">

                </div>
                <div class="panel-footel text-center">
                  Welcome {{$UsersRole->RoleName}} - You are logged in!  </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
