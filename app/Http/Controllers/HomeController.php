<?php

namespace App\Http\Controllers;
use Auth;
use App\Proposal;
use App\User;
use App\Role;
use App\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $usersrole = $currentuser->role;
        $roleid = $usersrole->id;
        if ($roleid == 2) {

          return view('userDash',compact('usersrole'));
        }
        else if ($roleid == 4) {
          return view('admin.adminDash', compact('usersrole'));
        }
        else if ($roleid == 1) {
          return view('partners.partnerDash', compact('usersrole'));
        }
        else {
            return view('auth.login');
        }

    }

    public function update(Proposal $proposal , Role $role, Partner $partner)
    {
      $partnerid = 1;
      $id = $proposal->id;
      $proposal= Proposal::find($id);
      $user = $proposal->User->id;
      $theuser = User::find($user);

      User::where('id',$user)->update(array('role_id'=>'1'));
      $companyname = $proposal->CompanyName;
      $companyemail= $proposal->CompanyEmail;
      $hqaddress = $proposal->HQAddress;

      $theuser->addPartner(

        $partner->create(
        [
          'CompanyName' => $companyname,
        'CompanyEmail'=> $companyemail,
        'HQAddress'=>$hqaddress,
        'user_id'=> $user]
        )


      );
      $proposal->delete();
      return back();

    }


}
