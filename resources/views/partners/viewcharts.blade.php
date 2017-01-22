 @extends('layouts.app')

 @section('content')


 <div class="container">

                {!! $chart->render() !!}
                <hr />
                  {!! $chart2->render() !!}
                  <hr />
                <center>

                <h3>Earnings</h3>  </center>

                        {!! $chart3->render() !!}


     </div>

 </div>
 </div>

 @endsection
