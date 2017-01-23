@extends('layouts.app')
@section('charts')
  {!! Charts::assets() !!}

@endsection
@section('content')

<!-- Loads all the charts from the controller onto the page -->
 <div class="container">

    {!! $chart->render() !!}
    <hr />
    {!! $chart2->render() !!}
    <hr />
    <center> <h3>Earnings</h3>  </center>

    {!! $chart3->render() !!}


</div>



 @endsection
