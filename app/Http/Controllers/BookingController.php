<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\Professional;
use App\User;
use App\Service;
use Validator;
use Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(@Auth::User()->role){
         $slider = Booking::orderby('id', 'DESC')->get();
        return view('backend.booking.index',compact("slider"));
   }else
    return  redirect()->route('customer.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        if(@Auth::User()->role){
            return view('backend.booking.edit',compact("booking"));
        }
        else
            return redirect()->route('customer.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->type = $request->type;
        $booking->update();
        return redirect()->route('booking.index')->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('success','Data Delete Successfully');
    }

    public function professionalchange($id){
        $service= Service::where('id',$id)->get();
   
       foreach($service as $index=>$p){
        $po = Professional::where('service_id', $p->id)->orderby('rating','desc')->get();
         
                   
        $service[$index]->topic= $po;
                     
          }
       
        return response($service);
        exit;
    }

    
}
