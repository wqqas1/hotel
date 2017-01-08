<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
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
        else if ($roleid == 1) {
          return view('admin.adminDash', compact('usersrole'));
        }
        else {
            return view('auth.login');
        }

    }
}
