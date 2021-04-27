<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Professional;
use App\Booking;
use Illuminate\Http\Request;
use Validator;
use Auth;
class FeedbackController extends Controller
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
        Feedback::where('see', 0)
          ->update(['see' => 1]);
        if(@Auth::User()->role){
         $slider = Feedback::orderby('id', 'DESC')->get();
        return view('backend.feedback',compact("slider"));
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
     $booking= Booking::findOrFail($request->id);
     $feedback= new Feedback;
     $feedback->professional_id= $booking->professional_id;
     $feedback->user_id= Auth::user()->id;
     $feedback->rating= $request->rating;
     $feedback->description= $request->description;
     $feedback->booking_id= $booking->id;
     $feedback->see=0;
     $feedback->save();
     $booking->fbdone=1;
     $booking->update();

    $actor= Professional::findOrFail($booking->professional_id);
    $avg= Feedback::where('professional_id',$booking->professional_id)->avg('rating');
    $actor->rating= $avg;
    $actor->update();
return redirect()->route('customerfeedback')->with('Success','Data added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking= Feedback::findOrFail($id);
        return view('backend.customer.feedbackedit',compact("booking"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $var= Professional::findOrFail($request->professional_id);
        if(empty($var)){
            return redirect()->route('customerfeedback')->wth('error','There is not selected professional so you cant Update rating');
        }
         $feedback->rating= $request->rating;
         $feedback->description= $request->description;
         $feedback->update();
         

    $avg= Feedback::where('professional_id',$request->professional_id)->avg('rating');
    $var->rating= $avg;
    $var->update();
return redirect()->route('customerfeedback')->with('Success','Data added Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {

        $feedback->delete();
        $booking= Booking::findOrFail($feedback->booking_id);
        if(!empty($booking)){
            $booking->fbdone=0;
            $booking->update();
        }
        $professional= Professional::find($feedback->professional_id);
   if(!empty($professional)){

    $avg= Feedback::where('professional_id',$feedback->professional_id)->avg('rating');
    $professional->rating= $avg;
    $professional->update();
   }

   return redirect()->route('feedback.index')->with('success','Data Delete Successfully');

    }

public function customerfeedback(){
    if(!@Auth::user()->role){
    $slider= Feedback::where('user_id', Auth::user()->id)->orderby('id','DESC')->get();
    return view('backend.customer.feedback',compact("slider"));
}
else{
  return redirect()->route('admin.dashboard')->with('error','Please Admin Sign in');
   }
}
public function feedbackcreate($id){
    if(!@Auth::user()->role){
    $feedback= Booking::findOrFail($id);
   return view('backend.customer.feedbackcreate',compact("feedback"));
}
else
return redirect()->route('admin.dashboard')->with('error','Please ! admin Sign in');
}
public function feedbackedit($id){
      if(!@Auth::user()->role){
        Booking::findOrFail($id);
     $feedback= Feedback::where('booking_id',$id)->first();
     if(empty($feedback)){
        return redirect()->back()->with('error','This feedback is for Professional but have not select professional on your booking');
     }

    return redirect()->route('feedback.edit',['id'=>$feedback->id]);
}
else
return redirect()->route('admin.dashboard');
}
}
