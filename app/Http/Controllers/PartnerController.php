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


      $partners = Partner::all();

      return view('admin.partnerlist' , compact('partners'));




       }

       public function addHotel(Partner $partner) {


                return view('partners.addhotel' , compact('partner'));
         }

       public function destroy(Partner $partner ,  User $user) {


         $id = $partner->id;
         $selectedpartner = $partner->find($id);
         $uid = $partner->user_id;
         User::where('id',$uid)->update(array('role_id'=>'2'));
         $selectedpartner->delete();
           return back();


           }
           public function HotelReservations(Hotel $hotel, Reservation $reservation) {

             $hotelid = $hotel->id;
             $hotel = Hotel::find($hotelid);
          $reservations = Reservation::where('hotel_id','=', $hotelid)->get();


                  return view('partners.hotels.viewReservations' , compact('reservations','hotel'));

            }
}
