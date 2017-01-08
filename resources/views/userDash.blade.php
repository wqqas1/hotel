@extends('layouts.app')

@section('content')
@unless ($usersrole->role_id ==2 )


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in! {{$usersrole->RoleName}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@else
  <h1> No Way.</h1>
  @endunless
