<?php


Route::get('/','FrontendController@index' )->name('home');
Route::get('/contact','FrontendController@contact' )->name('contact');
Route::get('/services/{service}','FrontendController@service' )->name('service');
Route::post('/contact','FrontendController@contactsub' )->name('contactsub');
Route::post('/search','FrontendController@search' )->name('frontend.search');
// Route::get('/abcd','FrontendController@abcd' )->name('abcd');

Auth::routes();
Route::prefix('/dashboard')->group(function () {
    Route::get('',  function () {
    	// if(!@Auth::user()->role){
    	// 	return redirect()->route('service');
    	// }
        return redirect()->route('admin.dashboard');
    });
    
Route::get('/', 'HomeController@index')->name('admin.dashboard');
Route::get('/profile', 'HomeController@profile')->name('customer.profile');

Route::resource('/contact', 'ContactController');
Route::resource('/booking', 'BookingController');
Route::resource('/service', 'ServiceController');
Route::resource('/slider', 'SliderController');
Route::resource('/professional', 'ProfessionalController');
Route::resource('/feedback', 'FeedbackController');
Route::get('/customerfeedback', 'FeedbackController@customerfeedback')->name('customerfeedback');
Route::get('/feedbackedit/{id}', 'FeedbackController@feedbackedit')->name('feedbackedit');
Route::get('/feedbackcreate/{id}', 'FeedbackController@feedbackcreate')->name('feedbackcreate');
Route::resource('/contact', 'ContactController');
Route::resource('/user', 'UserController');
Route::resource('/customerbooking','Customerbooking');
Route::post('/search', 'HomeController@search')->name('backend.search');
Route::get('/professionalchange/{id}', 'BookingController@professionalchange')->name('professionalchange');
Route::get('/customerbookings/{service}/{professor}','Customerbooking@bookingserpro')->name('bookingserpro');

});
