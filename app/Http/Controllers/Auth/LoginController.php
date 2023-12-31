<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

   protected function authenticated(Request $request, $user)
   {
<<<<<<< HEAD
=======
   
    
>>>>>>> 221755b80e4695058c19fa4913cfe5361d6241df
    if(Auth::user()->hasRole(5)){
        return redirect('/super-admin')->with('message','Welcome SuperAdmin');
    }else if(Auth::user()->hasRole(6)){
        return redirect('/human-resource')->with('message','Welcome SuperAdmin');
    }else{
        $redirectTo = RouteServiceProvider::HOME;
    }
   }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
