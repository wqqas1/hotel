<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
use App\User;
use App\Reservation;
use Crypt;
use PDF;
class ReservationController extends Controller
{
    public function index(Hotel $hotel , Room $room , Request $request) {

      if (Auth::check()) {

        $uid = Auth::id();
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

        $protectedCost = Crypt::encrypt($totalcost);


        return view('hotels.booking', compact('hotel','room','checkInStr','first','sec','checkOutStr','stayduration','totalcost','protectedCost','uid'));
      }
      else {
        return redirect ('/login');
      }
     }
     public function store(User $user, Hotel $hotel , Room $room,Request $request , Reservation $reservation, $first,$sec,$protectedCost) {




        $uid = Auth::id();
        $user = User::find($uid);
        $hotel = $room->hotel;
        $hotelid = $hotel->id;
       $firstname = $request->firstname;
       $lastname = $request->lastname;
       $totalcost = Crypt::decrypt($protectedCost);


          $reservation  = new Reservation;
          $reservation->hotel_id = $hotelid;
          $reservation->room_id = $room->id;
          $reservation->guestFirstName= $request->firstname;
          $reservation->guestlastName = $request->lastname;
          $reservation->checkIn = $first;
          $reservation->checkOut = $sec;
          $reservation->totalPrice = $totalcost;
          $user->addReservation($reservation);

          return redirect('/home');



     }
     public function show(User $user, Reservation $reservation) {

              $uid = Auth::id();
              $user = User::find($uid);
              $reservations = $user->reservations->sortBy('CheckIn');

                      return view('myreservations', compact('reservations'));

      }
      public function destroy(Reservation $reservation) {

        $id = $reservation->id;
        $reservation = Reservation::find($id);

        $reservation->delete();
          return back();


          }

          public function pdfview(Request $request,Reservation $reservation) {

            $uid = Auth::id();
            $id = $reservation->id;
            $room = $reservation->room;
            $hotel = $room->hotel;
            $hotelphoto = $hotel->photos->first();
            $reservation = Reservation::where('id','=',$id)->with('room')->get();




              $pdf= PDF::loadview('pdfview', compact('reservation','hotel','hotelphoto'));
              return $pdf->stream('pdfview.pdf');

          //  return view('pdfview',compact('reservation','hotel','hotelphoto'));



            }
}
