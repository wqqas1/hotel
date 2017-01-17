

@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form method="POST"  action="/search" enctype="multipart/form-data">

            {{ csrf_field()}}
          <div class="form-group">
                <label for="checkin">Check-in Date</label>
                <input class="date form-control" type="text" name="CheckInDate" id="checkin" placeholder="Select Date..">
                <label for="checkout">Check-out Date</label>
                <input class="date form-control" type="text" name="CheckOutDate" id="checkout" placeholder="Select Date..">
                <br />
                  <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form>


        </div>

    </div>

</div>

@endsection
@section('scripts')
  <script src="https://unpkg.com/flatpickr"></script>

  <script>
  flatpickr(".date", {
	minDate: "today",

});

</script>
@endsection
