<?php
namespace App\Helpers;
use App\User;
use App\Contact;
use App\Feedback;
use App\Service;

 
class Helper{
	public static function allsearch(){
	$allsearch= Actor::where('status',1)->orderby('rating','desc')->get();
	return $allsearch;
}

	static function contact(){
		return Contact::where('see',0)->count();

	}

	static function contacts(){
		return Contact::where('see',0)->orderby('id','DESC')->limit(3)->get();

	}

	static function feedback(){
		return Feedback::where('see',0)->count();

	}

	static function feedbacks(){
		return Feedback::where('see',0)->orderby('id','DESC')->limit(3)->get();

	}
static function sermenu(){
		return Service::orderby('id','DESC')->get();

	}
	
	
}