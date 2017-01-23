<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\Room;
use Auth;
use Illuminate\Http\Request;
class RoomsController extends Controller
{
    // Adds a new Room to a Hotel
    public function store(Request $request, Hotel $hotel) {

        $Room = new Room($request->all());

        $hotel->addRoom($Room);

        return back();
     }

    public function edit(Room $room) {

        return view('partners.hotels.rooms.editroom', compact('room'));


     }

     // Updates the specific room's details in the database.
    public function update(Request $request, Room $room) {

        $room->update($request->all());
        return back();

      }

    // Removes the room from the Hotel.
    public function destroy(Request $request, Room $room) {

        $Id = $room->id;
        $Room = $room->find($Id);
        $Room->delete();

        return back();

      }

}
