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


      // Use the current Users Partner ID to find hotels provided by the logged in partner and places the ID's of these hotels into an Array.
      $PartnerId = $partner->id;
      $Hotels = Hotel::where('partner_id','=',$PartnerId)->get();
      $HotelId = $Hotels->pluck('id');




      // calculates the total earnings and the earnings made in the current month.

      $TotalEarnings = Reservation::where('hotel_id',$HotelId)
      ->sum('totalPrice');




      $MonthlyEarnings = Reservation::where('hotel_id',$HotelId)
      ->where('created_at', '>=',Carbon::now()->startOfMonth())
      ->sum('totalPrice');



      //Returns a list of countries that the partners hotels are located in and the number of hotels in each Country.

      $GetCountries = DB::table('hotels')->where('partner_id','=',$PartnerId)
      ->select('Country')
      ->GroupBy('Country')
      ->get();

      $Countries = $GetCountries->pluck('Country');


      foreach ($Countries as $Country) {
              $Count[]=$Hotels
              ->where('Country','=',$Country)->count();
      }




      // Counts the Number of reservations for each hotel in the current month.

      $GetReserv = Reservation::whereIn('hotel_id',$HotelId)
      ->where('created_at', '>=',Carbon::now()->startOfMonth())
      ->get();



      foreach ($HotelId as $Id) {

                    $NumOfReserv[]=$GetReserv
                    ->where('hotel_id','=',$Id)->count();

                                                            }



      /* Creates 3 charts , 1. Total Bookings for each hotel in the current month ,
                            2 .Number of hotels per country
                            3.Earnings In the current month         */

        $chart =  Charts::create('bar', 'highcharts')
            ->title('Total Bookings')
            ->elementLabel('Number Of Bookings')
            ->labels($Hotels->pluck('Name'))
            ->values($NumOfReserv)
            ->dimensions(1000,500)
            ->responsive(true);


        $chart2 =  Charts::create('bar', 'highcharts')
            ->title('Hotels Per Country')
            ->elementLabel('Number Of Hotels')
            ->labels($Countries)
            ->values($Count)
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
