@extends('layouts.app')
@section('content')
    <!-- Checks to see if a User already has a proposal
        If the user doesnt have a proposal , a form is displayed. -->
@if (is_null($User->proposals))
  <h3>Partner with Check-In.com</h3>
    <form method="POST" action="/proposal/{{$User->id}}/new">
      {{ csrf_field()}}

      <div class="form-group row">
        <label for="namebox" class="col-2 col-form-label">Company Name:</label>
          <div class="col-10">

              <input class="form-control" name="CompanyName" type="text" value="" id="namebox">

          </div>
      </div>

      <div class="form-group row">
        <label for="emailbox" class="col-2 col-form-label">Company Email:</label>
            <div class="col-10">

               <input class="form-control" name="CompanyEmail" type="text" value="" id="emailbox">

            </div>
      </div>

      <div class="form-group row">
        <label for="Addressbox" class="col-2 col-form-label">Company HQ Address:</label>
           <div class="col-10">

              <input class="form-control" name="HQAddress" type="text" value="" id="Addressbox">
          </div>
      </div>

      <div class="form-group row">
        <label for="Descbox" class="col-2 col-form-label">Your Vision:</label>
           <div class="col-10">

              <textarea class="form-control" name="Vision" type="text" value="" id="Descbox"></textarea>
          </div>
      </div>

      <button type="submit" class="btn btn-primary">Join</button>
  </form>

<!-- If the User does have a Proposal -->
@else
  <p>
    You already have a pending proposal.
  </p>

@endif





@endsection
