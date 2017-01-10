@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <h3 class="text-center">All Partners</h3>
                @foreach ($partners as $partner)
                  <li class="list-group-item text-center">
                    {{$partner->CompanyName}} <a class="btn btn-sm btn-danger pull-right" href="/partners/{{$partner->id}}/destroy">Remove</a>
                  </li>

                @endforeach

              </div>
                <div class="panel-body">

                </div>
                    <a href="/home" class="btn btn-info">Back to Dashboard.</a>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
