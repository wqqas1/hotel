<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\Review;
use Auth;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Request $request, Hotel $hotel) {


    //  $review = new Review;
    //  $review->comment = $request->comment;
    //  $hotel->reviews()->save($review);

    $review = new Review($request->all());
    $review->user_id = Auth::id();

      $hotel->addReview($review);

      return back();
       }

       public function edit(Review $review) {
         
         return view('reviews.edit', compact('review'));


         }

         public function update(Request $request, Review $review) {

           $review->update($request->all());
           return back();

            }
}
