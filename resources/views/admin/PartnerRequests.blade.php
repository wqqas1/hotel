@extends('layouts.app')
@section('content')

  <h3>Partner Requests from Users:</h3>
  <ul>


    <table class="table">

    <thead>
      <tr>
      <th>Company Name</th>
      <th>Email</th>
      <th>HQ Address</th>
      <th>Vision</th>
      </tr>
    </thead>
    <tbody>


    @foreach ($proposals as $proposal)

      <tr>
        <td><a class="" href="#">{{$proposal->CompanyName}}</a></td>
        <td>{{$proposal->CompanyEmail}}</td>
        <td>{{$proposal->HQAddress}}</td>
        <td>{{$proposal->Vision}}</td>

            <td><a class="btn btn-success pull-right" href="/proposal/{{$proposal->id}}/accept">Accept</a></td>
            <td>

            <a class="btn btn-danger pull-right" href="/proposal/{{$proposal->id}}/destroy">Refuse</a></td>






      </tr>

    @endforeach
  </tbody>
  </table>

  <a href="/home" class="btn btn-info">Back to Dashboard.</a>







@endsection
