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

  //Advanced Search.
  public function index(Request $request) {
      // Gets the search term and Number of travelers.
        $Searchterm = $request->get('searchterm');
        $NumTravelers = $request->get('numtravelers');

    /* Attempts different combinations to see the Search specifics provided and finds
     the correct hotels from these specifics.    */
    if (empty($Searchterm) && empty($NumTravelers)) {
      $Hotels = Hotel::all();

    }

        else if(!empty($Searchterm) && empty($NumTravelers)) {


          $Hotels = Hotel::where('Name','LIKE','%'.$Searchterm.'%')
          ->orwhere('City','LIKE','%'.$Searchterm.'%')
          ->orwhere('Country','LIKE','%'.$Searchterm.'%')
          ->orwhere('Address','LIKE','%'.$Searchterm.'%')
          ->get();
        }

            else if (empty($Searchterm) && !empty($NumTravelers)){

                $Hotels = Hotel::whereHas('rooms',function($q) use ($NumTravelers)
                {
                  $q->where('Capacity',$NumTravelers);

                })->get();
              }


                      else if (!empty($Searchterm) && !empty($NumTravelers)) {
                        $Hotels = Hotel::whereHas('rooms',function($q) use ($NumTravelers)
                        {
                          $q->where('Capacity',$NumTravelers);

                        })->where(function ($q2)use ($Searchterm){

                                  $q2->where('Name','LIKE','%'.$Searchterm.'%')
                                  ->orwhere('City','LIKE','%'.$Searchterm.'%')
                                  ->orwhere('Country','LIKE','%'.$Searchterm.'%')
                                  ->orwhere('Address','LIKE','%'.$Searchterm.'%');

                                    })->get();

                          }



        // Splits the Date range and puts Check In and Check out into Session Variables.
        $Hotels->load('thumbnail');
        $Range = explode('to',$request->daterange);
        $CheckIn = date('Y-m-d',strtotime($Range[0]));
        $CheckOut = date('Y-m-d',strtotime($Range[1]));


        $request->session()->put('checkin',$CheckIn);
        $request->session()->put('checkout',$CheckOut);



        return view('hotels.allhotels' , compact('Hotels'));




      }


      // Controller to provide Hotel Details.
      public function show(Hotel $hotel , Request $request) {


        $hotel->load('reviews.user');
        $Photos = $hotel->photos->shift();
        $LoadReserv = $hotel->load('rooms.reservation');
        $Rooms = $hotel->rooms;

        // Gets the Checkin and checkout dates from the session variable
        $FirstDate = $request->session()->get('checkin');
        $SecDate = $request->session()->get('checkout');

        // Tries to match the checkin and checkout dates with other reservations of the same Hotel room
        foreach ($Rooms as $Room) {
            $Id =  $Room->id;

            $RoomsBooked = Reservation::where('room_id','=', $Id)
            ->where('CheckIn','>=',$FirstDate)
            ->where('CheckOut','<=',$SecDate)

                ->orWhere(function($query) use ($FirstDate,$Id)
                    {
                      $query->where('room_id','=', $Id)
                            ->where('CheckIn','<=',$FirstDate)

                            ->where('CheckOut','>=',$FirstDate);
                          })

                            ->orWhere(function($query2) use ($FirstDate,$SecDate,$Id)
                            {
                              $query2->where('room_id','=', $Id)
                                    ->where('CheckIn','>=',$FirstDate)

                                    ->where('CheckIn','<=',$SecDate);
                                  })->count();


                  // Works out How many rooms are available
                  $Roomsavailable = $Room->TotalRooms;
                  $Roomsleft =  $Roomsavailable - $RoomsBooked;
                  $Room->spaceleft = $Roomsleft;
            }

            // Works out the rating of each hotel using the Ratings left by users.
            $Reviews = $hotel->reviews;
            if ($hotel->hasReview()) {

                    foreach ($Reviews as $Review) {

                      $Ratings[] = $Review->rating;
                    }
              $NumReviews = count($Ratings);
              $Total = array_sum($Ratings);
              $Rating = (round($Total / $NumReviews));

              //Displays the correct image depending on the rating.
              if ($Rating >= 80) {

                $starPath = "/images/5star.png";
                }
                  else if ($Rating >=60) {
                      $starPath = "/images/4star.png";
                    }
                    else if ($Rating >=40) {
                        $starPath = "/images/3star.png";
                      }
                        else if ($Rating >=20) {
                            $starPath = "/images/2star.png";
                          }
                            else {


                              $starPath = "/images/1star.png";
                              }

            }
            // If No reviews have been left , the rating is 0
                else{


                  $starPath = "/images/NR.png";
                  $Rating = "0";
                }



                //Checks to see if User has booked the hotel before.
                $UID=Auth::id();
                $User = User::find($UID);

                if($User->reservationDate($hotel)) {
                    $RecentBooking = true;
                  }
                    else {
                          $RecentBooking = false;
                      }



                // Recommends another Hotel
                  $City = $hotel->City;
                  $Recommended = Hotel::inRandomOrder()->where('City','=',$City)
                  ->where('id','!=',$hotel->id)
                  ->first();

                  if (is_null($Recommended)) {
                            $Recommended = false;
                          }



         return view('hotels.hoteldetails', compact('hotel','Photos','Rating','starPath','RecentBooking','Recommended'));


       }





            // Add a New Hotel to the Website and adds uploaded Thumbnail Photos to the website.

            public function store(Request $request, Hotel $hotel ,Partner $partner) {


              $Hotel = new Hotel;
              $Hotel->Name = $request->Name;
              $Hotel->Address = $request->Address;
              $Hotel->City = $request->City;
              $Hotel->Country= $request->Country;
              $Hotel->TelephoneNumber = $request->TelephoneNumber;
              $Hotel->ImagePath = $request->ImagePath;
              $Hotel->description = $request->description;
              $partner->hotels()->save($Hotel);


              $HotelId = $Hotel->id;
              $CurrentHotel = Hotel::find($HotelId);

              $File=$request->file('displaypic');


              $Name = time() . $File->getClientOriginalName();
              $File->move('hotelphotos/photos', $Name);


              $Hotel->photos()->create(['path'=>"/hotelphotos/photos/{$Name}"]);
              return view('partners.hotels.addphoto', compact('CurrentHotel','partner'));

              }


              // Display Only the Hotels that the Logged in Partner has added to the website.
               public function ShowHotelsByPartner(Hotel $hotel, Partner $partner) {

                 $Hotels = $partner->hotels;

                 return view('partners.showhotel', compact('Hotels'));


                }

                // Shows the partner A "Hotel Dashboard" , once they have selected a Hotel.
                public function ShowDash(Hotel $hotel) {


                      return view('partners.actions', compact('hotel'));
                 }

                // Display the Edit Hotels Form .
                 public function edit(Hotel $hotel, Partner $partner) {
                   $Partner = $hotel->partner;

                   $Photos = $hotel->photos->shift();

                   return view('partners.edithotel', compact('hotel','Partner','Photos'));


                   }


                  //Update the Database with the edited details including thubnailpath if it has been changed.
                 public function update(Request $request, Hotel $hotel) {

                    $hotel->update($request->all());

                       if (!empty($request->file('displaypic'))) {

                          $File=$request->file('displaypic');
                          $Name = time() . $File->getClientOriginalName();
                          $File->move('hotelphotos/photos', $Name);
                          $Thumbnail = $hotel->thumbnail;
                          $Thumbnail->path = "/hotelphotos/photos/{$Name}";
                          $Thumbnail->save();
                       }

                       return back();

                    }

                    //Deletes the Hotel.
                    public function destroy(Request $request,Hotel $hotel) {


                        $Id = $hotel->id;
                        $CurrentHotel = Hotel::find($Id);

                        $CurrentHotel->rooms()->delete();
                        $CurrentHotel->delete();
                        return redirect('/home');

                     }



}
