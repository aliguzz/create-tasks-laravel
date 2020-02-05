<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    public function index(){
        return view('dashboard');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }
}
