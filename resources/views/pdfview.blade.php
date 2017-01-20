<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hotels') }}</title>

    <!-- Styles -->
    <style>

        <?php include(public_path().'/css/app.css'); ?>
    </style>
  </head>
  <body>
    <div class="row">
      <div class="col-md-6 col-md-offset-3 ">

        <div class="container">
        <center>

  <div class="panel panel-default">
  <div class="panel-heading"><h1>Check-In.com Reservation</h1></div>

            @foreach ($reservation as $showdetails)
              <div class="panel-body">
                  <div><img  src="{{ public_path() .$hotelphoto->path}}"></div>

                <h3><b>{{$hotel->Name}}  </b></h3>
                <p>{{$hotel->description}}</p>
                <p>Address: {{$hotel->Address}} , {{$hotel->City}} , {{$hotel->Country}}.</p>
                <p>Contact: {{$hotel->TelephoneNumber}}</p>
              </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Booking Details</h3></div>
                <div class="panel-body">

                   <p><b>Reference Number: </b>{{$showdetails->id}}</p>
                    <p><b>Guest Name:</b>{{$showdetails->guestFirstName}} {{$showdetails->guestlastName}}</p>
                    <p><b>Check In Date:  </b>{{$showdetails->CheckIn}}  / <b>Check Out Date:  </b>  {{$showdetails->CheckOut}}</p>
                    <p><b>Room Name:</b> {{$showdetails->room->RoomType}}</p>
                    <p><b>Beds Provided:</b> {{$showdetails->room->BedOption}}</p>
                    <p><b>Room View:</b> {{$showdetails->room->View}}</p>
                    <p><b>Total Price:</b> £{{$showdetails->totalPrice}}</p>
                </div>






          </div>


             </center>



    @endforeach




      </div>
    </div>
    </div>
  </body>
  </html>
