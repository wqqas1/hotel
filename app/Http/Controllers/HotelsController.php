<?php

namespace App\Http\Controllers;
Use Auth;
Use App\Hotel;
Use App\Partner;
Use App\Room;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index() {
      $hotels = Hotel::all();

      return view('hotels.allhotels' , compact('hotels'));

      }

      public function show(Hotel $hotel) {

        //$hotel->load('reviews.user');
        // $review = Hotel::with('reviews.user')->get();
        $hotel->load('reviews.user');



          return view('hotels.hoteldetails', compact('hotel'));

       }


    //      public function edit(Review $review) {

      //      return view('reviews.edit', compact('review'));


      //      }

            public function store(Request $request, Hotel $hotel ,Partner $partner) {



            $hotel = new Hotel;
            $hotel->Name = $request->Name;
            $hotel->Address = $request->Address;
            $hotel->City = $request->City;
            $hotel->Country= $request->Country;
            $hotel->TelephoneNumber = $request->TelephoneNumber;
            $hotel->ImagePath = $request->ImagePath;
            $hotel->description = $request->description;

            $partner->hotels()->save($hotel);
            return back();

               }

               public function ShowHotelsByPartner(Hotel $hotel, Partner $partner) {

                 $hotels = $partner->hotels;

                 return view('partners.showhotel', compact('hotels'));


                 }
                 public function edit(Hotel $hotel, Partner $partner) {
                   $partner = $hotel->partner;


                   return view('partners.edithotel', compact('hotel','partner'));


                   }

                 public function update(Request $request, Hotel $hotel) {

                   $hotel->update($request->all());
                   return back();

                    }

                    public function destroy(Request $request,Hotel $hotel) {


                        $id = $hotel->id;
                        $currenthotel = Hotel::find($id);

                        $currenthotel->rooms()->delete();
                        $currenthotel->delete();
                        return redirect('/home');

                     }


}
