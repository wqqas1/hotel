<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Hotel;
use App\HotelPhoto;
class HotelPhotosController extends Controller
{
      public function uploadPhoto(Hotel $hotel) {



          return view('partners.hotels.newphotos',compact('hotel'));


       }
      public function addphoto(Request $request , Hotel $hotel) {


         $file=$request->file('file');
         $name = time() . $file->getClientOriginalName();
         $file->move('hotelphotos/photos', $name);


         $hotel->photos()->create(['path'=>"/hotelphotos/photos/{$name}"]);

      }
      public function destroy(Request $request, Hotel $hotel ,HotelPhoto $hotelphoto) {

        $id = $hotelphoto->id;
        $photo = HotelPhoto::find($id);
        $photo->delete();
        return back();



       }
}
