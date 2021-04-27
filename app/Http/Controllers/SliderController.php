<?php

namespace App\Http\Controllers;
 
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class SliderController extends Controller
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
         $slider = Slider::orderby('id', 'DESC')->get();
        return view('backend.slider.index')->with('slider',$slider);
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
        return view('backend.slider.create');
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
           
    $slider = new Slider;
    $slider->name = $request->name;
    $slider->description = $request->description;
    $slider->image =$fileNameToStore;

    $slider->save();
    return redirect()->route('slider.index')->with('success','Slider Added Successfully');
    
    
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        
    return redirect()->route('slider.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        if(@Auth::User()->role){
        return view('backend.slider.edit',compact('slider'));
    }else
    return redirect()->route('customer.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
               
         $Validator = Validator::make($request->all(), [
          'name' => 'required',
         'description' => 'required',
        
        
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
            $img= Slider::where('id', $slider->id)->get();
            $fileNameToStore= $img[0]->image;
            
          
        }
      
    $child =$slider;
    $child->name = $request->name;
    $child->description = $request->description;
    $child->image =$fileNameToStore;
    
    $child->update();

   

return redirect()->route('slider.index')->with('success', 'Slider Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete(); 
            return redirect()->route('slider.index')->with('success','Data Delete Successfully');
    }

}
