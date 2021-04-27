<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Professional;
use App\User;
use App\Service;
use Illuminate\Http\Request;
use Validator;
use Auth;

class Customerbooking extends Controller
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
        if(@!Auth::User()->role){
         $booking = Booking::where('user_id', Auth::user()->id)->where('type','!=', 1)->orderby('id', 'DESC')->get();
        return view('backend.customer.index')->with('slider',$booking);
   }else
    return  redirect()->route('admin.dashboard')->with('error','Please! Log In Customer Account');
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(@!Auth::User()->role){
            $sservice=0;
            $sprofessor=0;
        $professional= Professional::orderby('id','DESC')->get();
        $service= Service::orderby('id','DESC')->get();
        return view('backend.customer.bookingcreate',compact("professional","service","sservice","sprofessor"));
    }else
       return  redirect()->route('admin.dashboard')->with('error','Please! Sign In Customer Account');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validator = Validator::make($request->all(), [
          
           'service_id'=>'required'
        
        ],
         ["service_id.required" => trans('Please select  Service'),
          
        ]);
       
           if ($Validator->fails()) {
           
            return redirect()->back()->withInput($request->input())->withErrors($Validator);
            }
       
         
           
    $slider = new Booking;
    $slider->user_id = Auth::user()->id;
    $slider->professional_id= $request->professional_id;
    $slider->service_id= $request->service_id;
    $slider->type=0;
    $slider->description = $request->description;
    $slider->save();
    return redirect()->route('customerbooking.index')->with('success','Data Added Successfully');
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
    public function edit(Booking $booking, $id)
    {
         $booking= Booking::findOrFail($id);
        if(@!Auth::User()->role){
        $professional= Professional::orderby('id','DESC')->get();
        $service= Service::orderby('id','DESC')->get();
        return view('backend.customer.bookingedit',compact("booking","professional","service"));
    }else
       return  redirect()->route('admin.dashboard')->with('error','Please! Sign In Customer Account');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking= Booking::findOrFail($id);
        $Validator = Validator::make($request->all(), [
          
           'service_id'=>'required'
        
        ],
         ["service_id.required" => trans('Please select  Service'),
          
        ]);
       
           if ($Validator->fails()) {
           
            return redirect()->back()->withInput($request->input())->withErrors($Validator);
            }
       
         
           
    $slider = $booking;
    $slider->professional_id= $request->professional_id;
    $slider->service_id= $request->service_id;
    $slider->description = $request->description;
    $slider->update();
    return redirect()->route('customerbooking.index')->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking, $id)
    {
        $booking= Booking::find($id);
        $type= $booking->type;
        if($type!=1){
            $booking->type=1;
            $booking->update();
            return redirect()->route('customerbooking.index')->with('success','Booking Cancel Successfully');
        }
        else{
            return redirect()->route('customerbooking.index')->with('error','Something wrong');
        }

    }

    public function bookingserpro($service, $prfessor){

        if(@!Auth::User()->role){
        $sservice= Service::where('url',$service)->first();

        if(empty($sservice)){
        return redirect()->route('home');
       }

     if($prfessor =='xyz'){
        $sprofessor=0;
    }else{
        $sprofessor= Professional::where('name',$prfessor)->first();
    }


        $professional= Professional::orderby('id','DESC')->get();
        $service= Service::orderby('id','DESC')->get();
        return view('backend.customer.bookingcreate',compact("professional","service","sservice","sprofessor"));
    }else
       return  redirect()->route('admin.dashboard')->with('error','Please! Sign In Customer Account');
        
    }


    
}
