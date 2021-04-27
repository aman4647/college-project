<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

class UserController extends Controller
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
         $slider = User::where('role','!=',1)->orderby('id', 'DESC')->get();
        return view('backend.user.index')->with('slider',$slider);
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
        if(@Auth::User()->role){
        return view('backend.user.create');
    }else
       return  redirect()->route('customer.profile');
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
          'name' => 'required',
           'email'=>'required|string|email|unique:users',
           'password'=>'required|string|min:8',
           'phone'  =>'required',
           
        
        ],
         ["name.required" => trans('Name is required'),
          
        ]);
       
           if ($Validator->fails()) {
           
            return redirect()->back()->withInput($request->input())->withErrors($Validator);
            }
       
         
           
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->role = $request->role;
    $user->description = $request->description;
    $user->save();
    return redirect()->route('user.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(@Auth::User()->role){
        return view('backend.user.edit',compact('user'));
    }else
    return redirect()->route('customer.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $Validator = Validator::make($request->all(), [
          'name' => 'required',
           'email'=>'required|string|email',
           'phone' =>'required',
                   
        ],
         ["name.required" => trans('Name is required'),
          
        ]);
       
           if ($Validator->fails()) {
           
            return redirect()->back()->withInput($request->input())->withErrors($Validator);
            }
       
         
           
    $user->name = $request->name;
    $user->email = $request->email;
    if(isset($request->password)){
    $user->password = Hash::make($request->password);
    }
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->description = $request->description;
    $user->update();
    return redirect()->route('user.index')->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete(); 
            return redirect()->route('user.index')->with('success','Data Delete Successfully');
    }
}
