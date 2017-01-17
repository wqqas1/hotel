<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
class ReservationController extends Controller
{
    public function index(Hotel $hotel , Room $room , Request $request) {



        $first = $request->session()->get('checkin');

        $sec = $request->session()->get('checkout');

        $checkin = strtotime($first);
        $checkInStr = date('F jS Y',$checkin);

        $checkout = strtotime($sec);
        $checkOutStr = date('F jS Y',$checkout);
        $difference = strtotime($sec) - strtotime($first);
        $stayduration = $difference/86400;

        $price = $room->Price;
        $totalcost = $stayduration * $price;


        return view('hotels.booking', compact('hotel','room','checkInStr','checkOutStr','stayduration','totalcost'));
     }
}
