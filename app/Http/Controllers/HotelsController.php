<?php

namespace App\Http\Controllers;
Use App\Hotel;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index() {
      $hotels = Hotel::all();
      return view('hotels.allhotels' , compact('hotels'));

      }

      public function show(Hotel $hotel) {

          $hotel->load('reviews.user');
          
          return view('hotels.hoteldetails', compact('hotel'));

       }
}
