@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

    <!-- Displays the Hotels Name, Country and City and Company Name -->
      <div class="page-header">

          <h2> {{ $hotel->Name}} <small class="text-muted">- <u>{{$hotel->partner->CompanyName}}</u></small>

          </h2>
          <small>{{ $hotel->Country}} |  {{ $hotel->City}}</small>
      </div>
      <!-- Slideshow of all the Hotels Photos -->
      <center>

        <div class="autoplay">
          @foreach ($hotel->photos as $Photo)
          <div><img  src="{{$Photo->path}}"></div>
          @endforeach
        </div>
    </center>
      <!-- End Slideshow -->

    <!-- Information Box , Hotel details ( Address, Tel etc ) & Hotel Rating-->
    <hr>
    <div class= "panel panel-primary">

      <div class = "panel-heading">
        <h3 class="panel-title">Hotel Details:</h3>
      </div>

      <div class="panel panel-body">

          <dl class="row">
              <dt class="col-sm-5">Check-In User Rating:</dt>
                <dd class="col-sm-7">
                    <img src="{{$starPath}}" />
                    <b>{{$Rating}}%</b>
                </dd>
              <dt class="col-sm-5">Address:</dt>
                <dd class="col sm-7">
                    {{ $hotel->Address}}
                </dd>
              <dt class="col-sm-5">Telephone Number:</dt>
                <dd class="col sm-7">
                    {{ $hotel->TelephoneNumber}}
                </dd>
        <!-- Unless there is only 1 hotel in this City , Display a recommended Hotel. -->
          @unless ($Recommended == false)

              <dt class="col-sm-5">Other Hotels Nearby:</dt>
                <dd class="col sm-7">
                    <a href="/hotels/{{$Recommended->id}}">{{$Recommended->Name}}</a>
                </dd>
          @endunless


        </dl>

  </div>
</div>

<hr>
      <!-- Displays a list of all Rooms that this Hotel Offers and the rooms information. -->
    <h4>Rooms:</h4>



    @foreach ($hotel->rooms as $Room)


      <h5><u> {{$Room->RoomType}}</u></h5>
      <p><mark>Max Occupants :</mark>  {{$Room->Capacity}} People.</p>
      <p><mark>Beds Provided :</mark> {{$Room->BedOption}}.</p>
      <p><mark>View :</mark> {{$Room->View}}.</p>
      <p><mark>Price :</mark> £{{$Room->Price}}</p>
      <p><b>Rooms Left: </b>{{$Room->spaceleft}}</p>

        <!-- If Room has more than 0 rooms , Display a button to book the room. -->
        @if ($Room->spaceleft > 0)

          <a href="/book/{{$hotel->id}}/{{$Room->id}}" class="btn btn-success">Book</a>
          <hr />



        @endif

    @endforeach


<hr>
<!-- Displays a table with all the reviews of the hotel that users have left. -->
<h4>Reviews:</h4>

<table class="table">

      <thead>
        <tr>
        <th>User</th>
        <th>Comment</th>
        <th></th>
        </tr>
      </thead>
      <tbody>


        @foreach ($hotel->reviews as $Review)

          <tr>
              <td><a class="" href="#">{{$Review->user->name}}:</a></td>
              <td>{{$Review->comment}}</td>
              <!-- If the User that Posted the review and the current user match , display an edit and Delete button. -->
              @if ($Review->user_id == Auth::id())
                  <td><a class="btn btn-default pull-right" href="/reviews/{{$Review->id}}/edit">Edit Review</a></td>
                  <td><a class="btn btn-danger pull-right" href="/reviews/{{$Review->id}}/destroyreview">Delete Review</a></td>

                  @else
                    <td></td>
                    <td></td>
              @endif

          </tr>

        @endforeach
      </tbody>
</table>
<hr>
<!-- If the User has made a booking with the current hotel , display a Add review form. -->
@if ($RecentBooking == true)


    <h4>Add a New Review</h4>
    <form method="POST" action="/hotels/{{$hotel->id}}/reviews">
      {{ csrf_field()}}

        <div class="form-group">

          <textarea name="comment" class="form-control">{{ old('comment')}}</textarea>
          <!-- Display a Star rating input for the user to rate the hotel out of 5 stars. -->
          <label>Star Rating:</label><input type="hidden" name="rating" class="rating" data-stop="100" data-step="20" />

        </div>
        <div class="form-group">

          <button type="submit" class="btn btn-primary">Add Review</button>
        </div>
      </form>
@endif

<!-- If Laravel Validation detects errors then this will show a message. -->
  @if (count($errors))
      <ul>
          @foreach ($errors->all() as $error)
          <div class="list-group">


            <li class="list-group-item list-group-item-action list-group-item-danger">
              {{$error}}
            </li>


          @endforeach
          </div>
      </ul>

    @endif
  </div>
</div>

@endsection

<!-- The scripts for the page are included below , Slideshow / Rating -->
@section('scripts')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="/js/bootstrap-rating.js" type="text/javascript"></script>
  <script>

      $('.autoplay').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        arrows:false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'

      });

  </script>

@endsection
