<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Professional;
use App\Booking;
use App\Service;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        if(@Auth::user()->role){
            $customers= User::where('role','=',0)->count();
            $services= Service::count();
            $professionals= Professional::count();
            $bookings= Booking::count();
            $all= collect(['customers'=>$customers,'services'=>$services,'professionals'=>$professionals,'bookings'=>$bookings]);
            
        return view('backend.index',compact("all"));
    }
       else{
        return redirect()->route('customer.profile');
    }
}

    public function profile(){
        $user= Auth::user();
        return view('backend.customer.profile',compact('user'));
    }

public function search(Request $request){
    $search= $request->search;
    $customer= User::where('name', 'like', '%' . $search . '%')
    ->where('role',0)->get();
    $professional= Professional::where('name', 'like', '%' . $search . '%')->get();
    $service= Service::where('name', 'like', '%' . $search . '%')->get();
    
   return view('backend.search',compact("customer","professional","service","search"));

}


}
