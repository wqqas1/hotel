<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{

  public function index(Proposal $proposal) {


    $userid = Auth::id();
    $user = User::find($userid);
    $user->load('proposals');

    return view('apply.becomePartner',compact('user'));



      }
  public function store(Request $request, User $user) {


//  $proposal = new Proposal($request->all());


//  $proposal->user_id = Auth::id();
  //  $proposal->save();
//  $user->proposals()->save($proposal);



      $user->addProposal(

        new Proposal($request->all())

      );


    return view('apply.aftersubmit', compact('request'));
     }

     public function show(Proposal $proposal) {

       //$hotel->load('reviews.user');
       // $review = Hotel::with('reviews.user')->get();
       $proposals = Proposal::all();





         return view('admin.PartnerRequests', compact('proposals'));

      }
      public function destroy(Request $request, Proposal $proposal) {

        $id = $proposal->id;
        $proposal = $proposal->find($id);
        $proposal->delete();

      //  return $review;
      //  $review = $review->find($id);
        return back();

          }

          public function status(Proposal $proposal, user $user) {


            $user->load('proposals');



              return view('apply.status', compact('user'));

            }
}
