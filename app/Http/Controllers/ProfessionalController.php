<?php

namespace App\Http\Controllers;

use App\Professional;
use App\Service;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ProfessionalController extends Controller
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
         $slider = Professional::orderby('id', 'DESC')->get();
        return view('backend.professional.index')->with('slider',$slider);
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
           
        return view('backend.professional.create');
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
          'name' => 'required|unique:professionals',
         'description' => 'required',
         'image' => 'required',
         'phone' =>'required',
         'services'=>'required',
                 
        ],
         ["name.required" => trans('Name  is required'),
          
        ]);
       
           if ($Validator->fails()) {
           
            return redirect()->back()->withInput($request->input())->withErrors($Validator);
            }
       
         if ($request->hasFile('image')) {
            // Get jst ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
             $filename = explode(".", $_FILES['image']['name']); //split by '.'
                array_pop($filename); //remove the last segment
                $filename = implode(".", $filename);
            //Filename to store
            $fileNameToStore =time() .$filename. '.' . $extension;

            if (!(
              
                (strcasecmp($extension, 'png') == 0) ||
                (strcasecmp($extension, 'jpg') == 0) ||
                (strcasecmp($extension, 'gif') == 0) ||
                (strcasecmp($extension, 'jpeg') == 0) 
                
            )) {
                return redirect()->back()->withInput($request->input())->with('error', 'Please select valid Image');
            }
            //uplod image
            $file = $request->file('image');
            $destinationPath = public_path('/gallery');
            $file->move($destinationPath, $fileNameToStore);
        } else {
            return redirect()->back()->withInput()->with('error', 'Image not selected...');
          
        }
           
    $slider = new Professional;
    $slider->name = $request->name;
    $slider->phone = $request->phone;
    $slider->email = $request->email;
    $slider->services = $request->services;
    $slider->description = $request->description;
    $slider->image =$fileNameToStore;
    $slider->save();
    return redirect()->route('professional.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function show(Professional $professional)
    {
        return redirect()->route('professional.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function edit(Professional $professional)
    { 
        if(@Auth::User()->role){
      
        return view('backend.professional.edit',compact('professional'));
    }else
    return redirect()->route('customer.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professional $professional)
    {
        $Validator = Validator::make($request->all(), [
          'name' => 'required',
         'description' => 'required',
         'phone' =>'required',
         'services'=>'required',
        
        
        ],
         ["name.required" => trans('Name  is required'),
          
        ]);
       
           if ($Validator->fails()) {
           
            return redirect()->back()->withInput($request->input())->withErrors($Validator);
            }

                   
         if ($request->hasFile('image')) {
            // Get jst ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
             $filename = explode(".", $_FILES['image']['name']); //split by '.'
                array_pop($filename); //remove the last segment
                $filename = implode(".", $filename);
            //Filename to store
            $fileNameToStore =time() .$filename. '.' . $extension;

            if (!(
              
                (strcasecmp($extension, 'png') == 0) ||
                (strcasecmp($extension, 'jpg') == 0) ||
                (strcasecmp($extension, 'gif') == 0) ||
                (strcasecmp($extension, 'jpeg') == 0) 
                
            )) {
                return redirect()->back()->withInput($request->input())->with('error', 'Please select valid Image');
            }
            //uplod image
            $file = $request->file('image');
            $destinationPath = public_path('/gallery');
            $file->move($destinationPath, $fileNameToStore);
        } else {
            $img= Professional::where('id', $professional->id)->get();
            $fileNameToStore= $img[0]->image;
            
          
        }
      
    $professional->name = $request->name;
    $professional->phone = $request->phone;
    $professional->email = $request->email;
    $professional->services = $request->services;
    $professional->description = $request->description;
    $professional->image =$fileNameToStore;   
     $professional->update();
return redirect()->route('professional.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professional $professional)
    {
        $professional->delete(); 
            return redirect()->route('professional.index')->with('success','Data Delete Successfully');
    }
}
