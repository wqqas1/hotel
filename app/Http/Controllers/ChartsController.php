<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
Use App\Hotel;
Use App\Reservation;
use Carbon\Carbon;
use App\Partner;
use DB;
class ChartsController extends Controller
{
    public function index(Partner $partner)
    {



      $partnerid = $partner->id;
      $hotels = Hotel::where('partner_id','=',$partnerid)->get();
      $hotelid = $hotels->pluck('id');

      $TotalEarnings = Reservation::where('hotel_id',$hotelid)
      ->sum('totalPrice');


      $MonthlyEarnings = Reservation::where('hotel_id',$hotelid)
      ->where('created_at', '>=',Carbon::now()->startOfMonth())
      ->sum('totalPrice');



      $countryquery = DB::table('hotels')->where('partner_id','=',$partnerid)
      ->select('Country')
      ->GroupBy('Country')
      ->get();

      $hotelcountry = $countryquery->pluck('Country');

      $NumOfReserv = Reservation::whereIn('hotel_id',$hotelid)
      ->where('created_at', '>=',Carbon::now()->startOfMonth())
      ->get();




        foreach ($hotelid as $id) {
                $count[]=$NumOfReserv
                ->where('hotel_id','=',$id)->count();

        }

        foreach ($hotelcountry as $country) {
                $count2[]=$hotels
                ->where('Country','=',$country)->count();
        }

    $chart =  Charts::create('bar', 'highcharts')
        ->title('Total Bookings')
        ->elementLabel('Number Of Bookings')
        ->labels($hotels->pluck('Name'))
        ->values($count)
        ->dimensions(1000,500)
        ->responsive(true);


        $chart2 =  Charts::create('bar', 'highcharts')
            ->title('Hotels Per Country')
            ->elementLabel('Number Of Hotels')
            ->labels($hotelcountry)
            ->values($count2)
            ->dimensions(1000,500)
            ->responsive(true);

            $chart3 =  Charts::create('percentage', 'justgage')
                ->title('Total Earnings from this month')
                ->elementLabel('Pounds')
                ->values([$MonthlyEarnings,0,$TotalEarnings])
                ->responsive(false)
                ->height(300)
                ->width(0);


        return view('partners.viewcharts', ['chart' => $chart,'chart2' => $chart2,'chart3' => $chart3]);
    }
}
