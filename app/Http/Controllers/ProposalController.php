<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{

    // Checks to see if a user has pending proposals and Shows them the Proposal form.
    public function index(Proposal $proposal) {


        $UserId = Auth::id();
        $User = User::find($UserId);
        $User->load('proposals');

        return view('apply.becomePartner',compact('User'));

        }

    // Stores the Submitted Proposal in the database.
    public function store(Request $request, User $user) {

            $user->addProposal(

                      new Proposal($request->all())    );


          return view('apply.aftersubmit', compact('request'));
       }



    public function show(Proposal $proposal) {

          $Proposals = Proposal::all();

          return view('admin.PartnerRequests', compact('Proposals'));

        }



        // Removes the Proposal
    public function destroy(Request $request, Proposal $proposal) {

          $Id = $proposal->id;
          $Proposal = $proposal->find($Id);
          $Proposal->delete();

          return back();

        }

    public function status(Proposal $proposal, user $user) {

          $user->load('proposals');

          return view('apply.status', compact('user'));

        }
}
