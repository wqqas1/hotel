<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\Review;
use Auth;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    // Validates and Adds a new Review
    public function store(Request $request, Hotel $hotel) {



        $this->validate($request, [
          'comment' => 'required|min:4' ]);

        $Review = new Review($request->all());
        $Review->user_id = Auth::id();

        $hotel->addReview($Review);

        return back();
    }


    public function edit(Review $review) {

      return view('reviews.edit', compact('review'));


    }

    // Updates the Review database with specifics edited by the user.
    public function update(Request $request, Review $review) {

       $this->validate($request, [
          'comment' => 'required|min:4' ]);

       $review->update($request->all());

       return back();

      }

    //Deletes the selected Review.
    public function destroy(Request $request, Review $review) {

        $Id = $review->id;
        $Review = $review->find($Id);
        $Review->delete();


        return back();

      }
}
