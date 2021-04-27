<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class ServiceController extends Controller
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
         $slider = Service::orderby('id', 'DESC')->get();
        return view('backend.service.index')->with('slider',$slider);
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
        return view('backend.service.create');
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
         'description' => 'required',
         'services' => 'required',
         'image' => 'required',
        
        ],
         ["title.required" => trans('Title  is required'),
          
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
    $str = strtolower($request->name);
   $url = preg_replace('/\s+/', '-', $str);
   $data= Service::where('url',$url)->first();
    if(!empty($data)){
        $data= rand(0000,9999);
    $url= $url.$data;
    }
           
    $slider = new Service;
    $slider->name = $request->name;
    $slider->description = $request->description;
    $slider->image =$fileNameToStore;
    $slider->url= $url;
    $slider->services= $request->services;
    $slider->save();
    return redirect()->route('service.index')->with('success','Data Added Successfully');
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return redirect()->route('service.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        if(@Auth::User()->role){
        return view('backend.service.edit',compact('service'));
    }else
    return redirect()->route('customer.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
              
         $Validator = Validator::make($request->all(), [
          'name' => 'required',
         'description' => 'required',
         'services' =>'required',
        
        
        ],
         ["title.required" => trans('Title  is required'),
          
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
            $img= Service::where('id', $service->id)->get();
            $fileNameToStore= $img[0]->image;
            
          
        }
      
    $service->name = $request->name;
    $service->description = $request->description;
    $service->image =$fileNameToStore;
    $service->services =$request->services;
    $service->update();

   

return redirect()->route('service.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete(); 
            return redirect()->route('service.index')->with('success','Data Delete Successfully');
    }
}
