<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Slider;
use App\Service;
use App\Booking;
use App\Feedback;
use App\Professional;
use App\Classes\Recommend;
use App\Classes\Contentbase;

class FrontendController extends Controller
{

    public function index(){

		$slider= Slider::orderby('id','DESC')->get();
        $service= Service::orderby('id','DESC')->limit(4)->get();
        $professional= Professional::orderby('rating','DESC')->get();
        $completed= Booking::where('type',3)->count();
        $happy= Feedback::where('rating','>', 5)->count();
        $all= collect(['completed'=>$completed,'happy'=>$happy]);
		return view('frontend.index',compact("slider","service","professional","all"));
	}

 public function contact(){
 	return view('frontend.contact');
 }
 public function contactsub(Request $request){
 	$contact= new Contact;
 	$contact->fname= $request->fname;
 	$contact->lname= $request->lname;
 	$contact->email= $request->email;
 	$contact->phone= $request->phone;
 	$contact->description= $request->description;
 	$contact->save();
 	return redirect()->route('contact')->with('success','Thank for your Message');

 }

 public function service(Request $request){
     $url= $request->service;
     $service= Service::where('url',$url)->first();
     if(empty($service)){
        return redirect()->route('home');
     }
  $professional= Professional::get();
    $name=array();
  
    foreach($professional as $index=>$prof){
        $name[$prof->name] = explode(',', $prof->services);
     }

    // ram ->["hoouse cleaning", "aaa", "gggg" ]
   $services= explode(',', $service->services);

   // $objects = [
   //           'The Matrix' => ['Action', 'Sci-Fi'],
   //          'Lord of The Rings' => ['Adventure', 'Drama', 'Fantasy'],
   //          'Batman' => ['Action', 'Drama', 'Crime'],
   //          'Fight Club' => ['Drama'],
   //          'Pulp Fiction' => ['Drama', 'Crime'],
   //          'Django' => ['Drama', 'Western'],

   //      ];


          // return $name;

       // return  $user = ['Ram','Prasad','Jaisi'];
   
   // return $name;

$engine = new Contentbase($services, $name);
$data =$engine->getRecommendation();
$datas= array();
// $json = json_decode($data);
foreach($data as $key => $val) {
       $pro= Professional::where('name',$key)->first();
     
      $datas []= array_push($datas, $pro);
    
    // foreach(((array)$data)[$key] as $val2) {
    //     $datas= array_push($datas, $val2);
    // }
}

 
// $json = json_decode('{"S01"🙁"001.cbf","002.cbf","003.cbf","004.cbf","005.cbf","006.cbf","007.cbf","008.cbf","009.cbf"],"S02"🙁"001.sda","002.sda","003.sda"],"S03"🙁"001.klm","002.klm"]}');
// foreach($json as $key => $val) {
//     echo "KEY IS: $key<br/>";
//     foreach(((array)$json)[$key] as $val2) {
//         echo "VALUE IS: $val2<br/>";
//     }
// }






// return $data= json_encode($data,true);


    // $professional=Professional::where('service_id',$service->id)->orderby('rating','desc')->get();
 	
  return view('frontend.service',compact("service"))->with('professional',$datas);
}

 public function search(Request $request){
 	 $search= $request->search;

    $professional= Professional::where('name', 'like', '%' . $search . '%')->get();
    $service= Service::where('name', 'like', '%' . $search . '%')->get();
   return view('frontend.search',compact("search","professional","service"));
 }
    
}
