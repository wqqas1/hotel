<?php

namespace App\Http\Controllers;
use App\Partner;
use App\User;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index() {


      $partners = Partner::all();

      return view('admin.partnerlist' , compact('partners'));




       }

       public function destroy(Partner $partner ,  User $user) {


         $id = $partner->id;
         $selectedpartner = $partner->find($id);
         $uid = $partner->user_id;
         User::where('id',$uid)->update(array('role_id'=>'2'));
         $selectedpartner->delete();
           return back();


           }
}
