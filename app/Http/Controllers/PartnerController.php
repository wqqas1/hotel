<?php

namespace App\Http\Controllers;
use App\Partner;
use App\User;
use App\Hotel;
use App\Reservation;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index() {

      // Displays the Partners List for the Admin.
      $Partners = Partner::all();

      return view('admin.partnerlist' , compact('Partners'));




       }
       //Downgrades A partner which has been selected by Admin to a normal User.
     public function remove(Partner $partner ,  User $user) {


         $Id = $partner->id;
         $SelectedPartner = $partner->find($Id);
         $UID = $partner->user_id;
         User::where('id',$UID)->update(array('role_id'=>'2'));
         $SelectedPartner->delete();
         return back();


        }


        public function addHotel(Partner $partner) {


            return view('partners.addhotel' , compact('partner'));
        }



        // Partner can View All the Hotels Confirmed Reservations
        public function HotelReservations(Hotel $hotel, Reservation $reservation) {

            $HotelId = $hotel->id;
            $Hotel = Hotel::find($HotelId);
            $Reservations = Reservation::where('hotel_id','=', $HotelId)->get();


            return view('partners.hotels.viewReservations' , compact('Reservations','Hotel'));

        }
}
