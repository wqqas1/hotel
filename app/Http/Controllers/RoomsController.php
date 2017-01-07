<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\Room;
use Auth;
use Illuminate\Http\Request;
class RoomsController extends Controller
{
    public function store(Request $request, Hotel $hotel) {

      $room = new Room($request->all());

     $hotel->addRoom($room);

       return back();




        }
}
