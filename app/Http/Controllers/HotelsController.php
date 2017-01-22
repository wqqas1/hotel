<?php

namespace App\Http\Controllers;
Use Auth;
Use App\Hotel;
Use App\Partner;
Use App\User;
Use App\Room;
use Illuminate\Http\Request;
use App\Reservation;
class HotelsController extends Controller
{
  public function index(Request $request) {
        $searchterm = $request->get('searchterm');
        $numtravelers = $request->get('numtravelers');

    if (empty($searchterm) && empty($numtravelers)) {
      $hotels = Hotel::all();

    }
    else if(!empty($searchterm) && empty($numtravelers)) {


      $hotels = Hotel::where('Name','LIKE','%'.$searchterm.'%')
      ->orwhere('City','LIKE','%'.$searchterm.'%')
      ->orwhere('Country','LIKE','%'.$searchterm.'%')
      ->orwhere('Address','LIKE','%'.$searchterm.'%')
      ->get();
    }
    else if (empty($searchterm) && !empty($numtravelers)){

        $hotels = Hotel::whereHas('rooms',function($q) use ($numtravelers)
        {
          $q->where('Capacity',$numtravelers);
        })->get();




    }
    else if (!empty($searchterm) && !empty($numtravelers)) {
      $hotels = Hotel::whereHas('rooms',function($q) use ($numtravelers)
      {
        $q->where('Capacity',$numtravelers);
      })
      ->where(function ($q2)use ($searchterm){
        $q2->where('Name','LIKE','%'.$searchterm.'%')
        ->orwhere('City','LIKE','%'.$searchterm.'%')
        ->orwhere('Country','LIKE','%'.$searchterm.'%')
        ->orwhere('Address','LIKE','%'.$searchterm.'%');
      })
        ->get();

    }


    $hotels->load('thumbnail');
    $range = explode('to',$request->daterange);
    $checkin = date('Y-m-d',strtotime($range[0]));
    $checkout = date('Y-m-d',strtotime($range[1]));

  //  $checkin = $request->CheckInDate;
  //  $checkout= $request->CheckOutDate;
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
                })
                ->orWhere(function($query2) use ($first,$sec,$id)
                {
                  $query2->where('room_id','=', $id)   //
                        ->where('CheckIn','>=',$first)

                        ->where('CheckIn','<=',$sec);
                      })->count();

          //('CheckIn','<=',$first)->where('CheckOut','>=',$first)->count();
            $roomsavailable = $room->TotalRooms;

              $roomsleft =  $roomsavailable - $result;
              $room->spaceleft = $roomsleft;
            }

              $reviews = $hotel->reviews;
            if ($hotel->hasReview()) {


              foreach ($reviews as $review) {

                $ratings[] = $review->rating;
              }
              $numReviews = count($ratings);
              $total = array_sum($ratings);
              $rating = (round($total / $numReviews));


              if ($rating >= 80) {

                $starPath = "/images/5star.png";
              }
              else if ($rating >=60) {
                  $starPath = "/images/4star.png";
              }
              else if ($rating >=40) {
                  $starPath = "/images/3star.png";
              }
              else if ($rating >=20) {
                  $starPath = "/images/2star.png";
              }
              else {


                $starPath = "/images/1star.png";
              }

            }
            else{


              $starPath = "/images/NR.png";
              $rating = "0";
            }


                          $uid=Auth::id();
                          $user = User::find($uid);

                          if($user->reservationDate($hotel)) {
                            $recentbooking = true;
                          }
                          else {
                            $recentbooking = false;
                          }

                          $city = $hotel->City;
                          $Recommended = Hotel::inRandomOrder()->where('City','=',$city)
                          ->where('id','!=',$hotel->id)
                          ->first();

                  



         return view('hotels.hoteldetails', compact('hotel','photos','rating','starPath','recentbooking','Recommended'));


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
                   public function ShowDash(Hotel $hotel) {


                         return view('partners.actions', compact('hotel'));
                    }

                 public function update(Request $request, Hotel $hotel) {

                   $hotel->update($request->all());
                   if (!empty($request->file('displaypic'))) {
                     $file=$request->file('displaypic');


                     $name = time() . $file->getClientOriginalName();
                     $file->move('hotelphotos/photos', $name);
                     $thumbnail = $hotel->thumbnail;
                     $thumbnail->path = "/hotelphotos/photos/{$name}";
                     $thumbnail->save();
                   }

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
