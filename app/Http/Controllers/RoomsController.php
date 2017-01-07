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
     public function edit(Room $room) {

       return view('partners.hotels.rooms.editroom', compact('room'));


       }

       public function update(Request $request, Room $room) {

         $room->update($request->all());
         return back();

          }

          public function destroy(Request $request, Room $room) {

            $id = $room->id;
            $room = $room->find($id);
            $room->delete();

          //  return $review;
          //  $review = $review->find($id);
            return back();

              }

}
