<?php

namespace App\Http\Controllers;
Use Auth;
Use App\Hotel;
Use App\Partner;
Use App\Room;
use Illuminate\Http\Request;
use App\Reservation;
class HotelsController extends Controller
{
    public function index(Request $request) {
      $hotels = Hotel::all();
      $hotels->load('thumbnail');
      $checkin = $request->CheckInDate;
      $checkout= $request->CheckOutDate;
      $request->session()->put('checkin',$checkin);
      $request->session()->put('checkout',$checkout);


//      $hotels= Hotel::with('thumbnail');





      return view('hotels.allhotels' , compact('hotels'));

      }

      public function show(Hotel $hotel , Request $request) {

        //$hotel->load('reviews.user');
        // $review = Hotel::with('reviews.user')->get();
        $hotel->load('reviews.user');

        $photos = $hotel->photos->shift();
        $load = $hotel->load('rooms.reservation');
        $rooms = $hotel->rooms;
        $first = $request->session()->get('checkin');

        $sec = $request->session()->get('checkout');
        foreach ($rooms as $room) {
            $id =  $room->id;

            $result = Reservation::where('room_id','=', $id)
            ->where('CheckIn','>=',$first)
            ->where('CheckOut','<=',$sec)
          ->orWhere(function($query) use ($first,$id)
          {
            $query->where('room_id','=', $id)   //
                  ->where('CheckIn','<=',$first)

                  ->where('CheckOut','>=',$first);
                })->count();
          
          //('CheckIn','<=',$first)->where('CheckOut','>=',$first)->count();
            $roomsavailable = $room->TotalRooms;

              $roomsleft =  $roomsavailable - $result;
              $room->spaceleft = $roomsleft;




        }






         return view('hotels.hoteldetails', compact('hotel','photos'));

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
            $hotelid = $hotel->id;
            $currenthotel = Hotel::find($hotelid);

            $file=$request->file('displaypic');


            $name = time() . $file->getClientOriginalName();
            $file->move('hotelphotos/photos', $name);


            $hotel->photos()->create(['path'=>"/hotelphotos/photos/{$name}"]);
            return view('partners.hotels.addphoto', compact('currenthotel','partner'));

               }

               public function ShowHotelsByPartner(Hotel $hotel, Partner $partner) {

                 $hotels = $partner->hotels;

                 return view('partners.showhotel', compact('hotels'));


                 }
                 public function edit(Hotel $hotel, Partner $partner) {
                   $partner = $hotel->partner;

                     $photos = $hotel->photos->shift();
                   return view('partners.edithotel', compact('hotel','partner','photos'));


                   }

                 public function update(Request $request, Hotel $hotel) {

                   $hotel->update($request->all());
                   $file=$request->file('displaypic');


                   $name = time() . $file->getClientOriginalName();
                   $file->move('hotelphotos/photos', $name);
                   $thumbnail = $hotel->thumbnail;
                   $thumbnail->path = "/hotelphotos/photos/{$name}";
                   $thumbnail->save();
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
