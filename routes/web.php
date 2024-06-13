<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Redirect::to('/Home');
// });
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you wanteve
    return "clear";
});
//Route::get('/sitemap.xml', 'SitemapController@index'); 

Route::get('/', 'CategoriesController@welcome');

Route::get('/search-product','PublicPages@search');
Route::get('/our-partners','PublicPages@partners');
Route::get('/contact', function () {
return view('contact');
});



Route::get('/about-us', function () {
   return view('about');
});
Route::get('/know-more-message-from-president', function () {
   return view('director');
});


Route::get('/cc', function () {
    dd("hihiiiii");
});

Route::get('/ccdd', function () {
    dd("sanju");
});

Route::get('/sanju', function () {
    dd("sanju");
});


Route::get('/profile','PublicPages@profile');
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/membership', function () { 
    
// return view('membership.create');
// }); publications   join-event/ 
Route::get('/publications','PublicPages@publications');
Route::get('/publication/search','PublicPages@publications_search');

Route::post('/events/store/memerid','PublicPages@event_membership');

Route::get('/membership','PublicPages@membership');
Route::get('/all-events','PublicPages@all_events');
Route::get('/all-video','PublicPages@all_video');
Route::get('/all-image','PublicPages@all_image');
Route::get('/all-gallery','PublicPages@all_gallery');
Route::get('/events/{id}','PublicPages@single_events');
Route::get('//event-detail/{id}','PublicPages@detail_events');
Route::get('/qrcode/{id}','PublicPages@qrcode_events');
Route::get('/join-event/{id}','PublicPages@join_event');
Route::get('/donation_request', 'PublicPages@adddonation_request');

Route::get('api/get-states', 'PublicPages@getState');


Route::post('/donation_request/store', 'UsersController@donation_request_store');
 


Route::post('/membership/user/store','EnquirysController@memnbershipuserstore');

Route::get('/search-gallery','PublicPages@visual');

Route::get('/login','PublicPages@login');
Route::post('/user/login','PublicPages@loginuser');
Route::get('/{data}','PublicPages@index');
Route::post('/enquiry/store','EnquirysController@store');

Route::get('/lms/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/lms/login','Auth\LoginController@login');

Route::group(['middleware' => 'auth'],function(){
    Route::post('/logout','Auth\LoginController@logout');

    //Home Routes...
    Route::get('/lms/home', 'HomeController@index')->name('home');
    Route::get('/home/enquiries', 'EnquirysController@view');

    //Settings Routes...  
    Route::get('/home/settings', 'HomeController@settings');
    Route::post('/home/settings/store', 'HomeController@store');
    Route::get('/home/preseident/message', 'HomeController@president_message');
     Route::post('/home/president/message/store', 'HomeController@president_message_store');
    
    //Member Route...     
    Route::get('/home/add/member', 'UsersController@member');
    Route::post('/home/add/member/store', 'UsersController@storemember');
    Route::get('/home/view/member', 'UsersController@viewmember');
     Route::get('/home/user/status/{id}/{status}', 'UsersController@statuschange');
     Route::get('/home/our/user/delete/{id}', 'UsersController@memberdelete');
     Route::get('/home/our/user/edit/{id}', 'UsersController@memberedit');
     Route::post('/home/add/member/update', 'UsersController@memberupdate');
     Route::get('/home/our/user/view/{id}', 'UsersController@membershow');
    
    //Organization Position     
     Route::get('/home/organization/position', 'UsersController@organization_positions');
     Route::post('/home/our/position/store', 'UsersController@organization_positions_store');
     Route::get('/home/our/position/delete/{id}', 'UsersController@organization_positions_delete');
     Route::get('/home/our/position/edit/{id}', 'UsersController@organization_positions_edit');
      Route::post('/home/our/position/update', 'UsersController@organization_positions_update');
      
      
      //all payments show here  
      Route::get('/home/user/all/payments', 'UsersController@all_paymenst');
       Route::post('/home/all/payments/status', 'UsersController@status_payments');
      
       //Organization Category     
     Route::get('/home/organization/cateory/position', 'UsersController@organization_category_positions');
     Route::post('/home/our/position/cateory/store', 'UsersController@organization_positions_category_store');
     Route::get('/home/our/position/cateory/delete/{id}', 'UsersController@organization_positions_category_delete');
     Route::get('/home/our/position/cateory/edit/{id}', 'UsersController@organization_positions_category_edit');
      Route::post('/home/our/position/cateory/update', 'UsersController@organization_positions_category_update');
      
       //OCategory     
     Route::get('/home/ocateory/position', 'UsersController@organization_ocategory_positions');
     Route::post('/home/ocateory/store', 'UsersController@organization_positions_ocategory_store');
     Route::get('/home/ocateory/delete/{id}', 'UsersController@organization_positions_ocategory_delete');
     Route::get('/home/ocateory/edit/{id}', 'UsersController@organization_positions_ocategory_edit');
      Route::post('/home/ocateory/update', 'UsersController@organization_positions_ocategory_update');
      
      //Country     
     Route::get('/home/country', 'UsersController@country');
     Route::post('/home/country/store', 'UsersController@country_store');
     Route::get('/home/country/delete/{id}', 'UsersController@country_delete');
     Route::get('/home/country/edit/{id}', 'UsersController@country_edit');
      Route::post('/home/country/update', 'UsersController@country_update');
      
      //home events     
        Route::get('/home/create/events', 'UsersController@add_events');
       Route::get('/home/events', 'UsersController@events');
       Route::post('/home/our/event/store', 'UsersController@eventsstore');
       Route::get('/home/event/delete/{id}', 'UsersController@eventsdelete');
       Route::get('/home/event/edit/{id}', 'UsersController@eventsedit');
       Route::post('/home/our/event/update', 'UsersController@eventsupdate');
      
      //Organization   
         Route::get('/home/organization', 'UsersController@organization');
         Route::post('/home/organization/store', 'UsersController@organization_store');
         Route::get('/home/organization/view', 'UsersController@organizationview');
         Route::get('/home/organization/delete/{id}', 'UsersController@organizationdelete');
         Route::get('/home/organization/edit/{id}', 'UsersController@organizationedit');
         Route::post('/home/organization/update', 'UsersController@organizationupdate');
          Route::get('/home/our/organization/view/{id}', 'UsersController@organizationshow');
    
    //Category Routes...  
    Route::get('/home/categories/add', 'CategoriesController@new');
    Route::post('/home/categories/add/store', 'CategoriesController@store');
    Route::get('/home/categories/view', 'CategoriesController@view');
    Route::get('/home/categories/delete/{id}', 'CategoriesController@destroy');
    Route::get('/home/categories/edit/{cid}', 'CategoriesController@edit');
    Route::post('/home/categories/update', 'CategoriesController@update');
    Route::get('/home/categories/change-status/{cid}', 'CategoriesController@changestatus');

    //Product Routes...
    Route::get('/home/products/add', 'ProductsController@new');
    Route::post('/home/products/add/store', 'ProductsController@store');
    Route::get('/home/products/view', 'ProductsController@view');
    Route::get('/home/products/edit/{pid}', 'ProductsController@edit');
    Route::post('/home/products/update', 'ProductsController@update');
    Route::get('/home/products/change-status/{pid}', 'ProductsController@changestatus');
    Route::post('/home/products/view/import', 'ProductsController@import');
    Route::post('/home/products/view/search', 'ProductsController@search');

    //User Routes...
    Route::get('/home/users/add', 'UsersController@new');
    Route::post('/home/users/add/store', 'UsersController@store');
    Route::get('/home/users/view', 'UsersController@view');
    Route::get('/home/users/change-status/{pid}', 'UsersController@changestatus');

    //Division Routes...
    Route::get('/home/division/add', 'DivisionsController@index');
    Route::post('/home/division/add/store', 'DivisionsController@store');
    Route::get('/home/division/change-status/{did}', 'DivisionsController@changestatus');
    Route::get('/home/division/edit/{did}', 'DivisionsController@edit');
    Route::post('/home/division/update', 'DivisionsController@update');

    //Pages Routes...
    Route::get('/home/pages/add', 'PagesController@new');
    Route::post('/home/pages/add/store', 'PagesController@store');
    Route::get('/home/pages/view', 'PagesController@view');
    Route::get('/home/pages/edit/{pid}', 'PagesController@edit');
    Route::post('/home/pages/update', 'PagesController@update');
    Route::get('/home/pages/change-status/{pid}', 'PagesController@changestatus');

        //visual Routes...
        Route::get('/home/visual/add', 'VisualController@create');
        Route::post('/home/visual/add/store', 'VisualController@store');
         Route::get('/home/visual/view', 'VisualController@show');
          Route::get('/home/visual/edit/{id}', 'VisualController@edit');
          Route::get('/home/visual/delete/{id}', 'VisualController@destroy');
          Route::post('/home/visual/update/{id}', 'VisualController@update')->name('/home.visual.update');
        
            //Gallery Routes...
            Route::get('/home/gallery/add', 'GallerysController@new');
            Route::post('/home/gallery/add/store', 'GallerysController@store');
            Route::get('/home/gallery/view', 'GallerysController@view');
            Route::get('/home/gallery/edit/{gid}', 'GallerysController@edit');
            Route::post('/home/gallery/update', 'GallerysController@update');
            Route::get('/home/gallery/change-status/{gid}', 'GallerysController@changestatus');
            
            //Blog Routes...
            Route::get('/home/blogs/add', 'BlogsController@new');
            Route::post('/home/blogs/add/store', 'BlogsController@store');
            Route::get('/home/blogs/view', 'BlogsController@view');
            Route::get('/home/blogs/edit/{pid}', 'BlogsController@edit');
            Route::post('/home/blogs/update', 'BlogsController@update');
            Route::get('/home/blogs/change-status/{bid}', 'BlogsController@changestatus');
        
            //My Profile Routes...
            Route::get('/home/profile', 'UsersController@profile');
            Route::post('/home/profile/update', 'UsersController@updateprofile');
            Route::post('/home/profile/change-password', 'UsersController@changepassword');
            
            // our partner   
            Route::get('/admin/our/partner', 'PartnerController@view');
            Route::post('/admin/our/partner/store', 'PartnerController@store');
            Route::get('/admin/our/partner/delete/{id}', 'PartnerController@destroy');
            Route::get('/admin/our/partner/edit/{id}', 'PartnerController@edit');
             Route::post('/admin/our/partner/update', 'PartnerController@update');
             
             
             // all user login routes        
             
             Route::get('/user/dashboard', 'UsersController@profiles');
             Route::get('/user/edit_profile', 'UsersController@edit_profiles');
             Route::post('/home/user/update/profile', 'UsersController@updateprofiles');
             Route::get('/user/organization', 'UsersController@userorganization');
             Route::get('/user/logout', 'UsersController@userlogout');
             Route::get('api/fetch-states', 'UsersController@fetchState');
             Route::post('/user/organization/update', 'UsersController@updateorganization');
             Route::get('/user/donation', 'UsersController@donations');
             Route::post('/user/donation/store', 'UsersController@donation_store');
             Route::get('/user/membership/card', 'UsersController@membershipcard');
              Route::get('/home/donation/edit/{id}', 'UsersController@donations_edit');
              Route::post('/user/donation/update', 'UsersController@donations_update');
              Route::get('/home/donation/show/{id}', 'UsersController@donations_show');
             

             //video part  
             Route::get('/home/video', 'UsersController@video');
              Route::post('/home/video/store', 'UsersController@videostore');
              Route::get('/home/video/delete/{id}', 'UsersController@videodelete');
              
              //education Qualification   
              Route::get('/home/education/qualification', 'UsersController@education_qualification');
              Route::post('/home/education/qualification/store', 'UsersController@education_qualification_store');
              Route::get('/home/education/qualification/{id}', 'UsersController@education_qualification_delete');
              
              
              //organization category 
              Route::get('/home/organization/category', 'UsersController@organization_category');
            //   Route::get('/home/organization/category/store', 'UsersController@organization_category_store');
              
              //payment category home/payment/category  
              Route::get('/home/payment/category', 'UsersController@payment_category');
              Route::post('/home/payment/category/store', 'UsersController@payment_category_store');
              Route::get('/home/payment/catgeory/{id}', 'UsersController@payment_category_delete');
              
              //currency category 
             Route::get('/home/currency/category', 'UsersController@currency_category');
             Route::post('/home/currency/store', 'UsersController@currency_category_store');
             
             //bank category  
             
             Route::get('/home/bank/category', 'UsersController@bank_category');
             Route::post('/home/bank/category/store', 'UsersController@bank_category_store');
             Route::get('/home/bank/delete/{id}', 'UsersController@bank_category_delete');
              Route::get('/home/bank/edit/{id}', 'UsersController@bank_category_edit');
              Route::post('/home/bank/category/update', 'UsersController@bank_category_update');
             
             // service 
            Route::get('/home/service/category', 'UsersController@service_category');
            Route::post('/home/service/category/store', 'UsersController@service_category_store');
            Route::get('/home/service/delete/{id}', 'UsersController@service_category_delete');
             
            //create voucer receipt     
            Route::get('/home/voucher', 'UsersController@voucher');
            
            Route::get('/home/create/receipt', 'UsersController@create_receipt');
            Route::get('/home/create/voucher', 'UsersController@create_voucher');
            
            Route::get('/home/receipt', 'UsersController@receipt');
            Route::get('/home/donation/requests', 'UsersController@donationrequests');
            Route::post('/home/voucher/store', 'UsersController@voucher_store');
             Route::get('/home/voucher/show/{id}', 'UsersController@voucher_show');
             Route::get('/home/receipt/show/{id}', 'UsersController@receipt_show');
             Route::get('/home/voucher/edit/{id}', 'UsersController@voucher_edit');
             Route::post('/home/voucher/update', 'UsersController@voucher_update');
             
             
            //website editor       
            Route::get('/home/slider', 'HomeController@slider');
            Route::post('/home/slider/store', 'HomeController@slider_store');
            Route::get('/home/slider/delete/{id}', 'HomeController@slider_delete');
             Route::get('/home/slider/edit/{id}', 'HomeController@slider_edit');
             Route::post('/home/slider/update', 'HomeController@slider_update');
             
             Route::get('/home/testimonials', 'HomeController@testimonials');
            Route::post('/home/testimonials/store', 'HomeController@testimonials_store');
            Route::get('/home/testimonials/delete/{id}', 'HomeController@testimonials_delete');
             Route::get('/home/testimonials/edit/{id}', 'HomeController@testimonials_edit');
             Route::post('/home/testimonials/update', 'HomeController@testimonials_update');
             
             //Event Attendance 

             Route::get('/attendance/mark/{event_id}', [AttendanceController::class, 'show'])->name('attendance.mark');
             Route::post('/attendance/mark/{event_id}', [AttendanceController::class, 'store'])->name('attendance.mark.store');
            //  Route::post('/events/join/{event_id}', [EventController::class, 'join'])->name('events.join');

            Route::get('/events/{id}/join', [EventController::class, 'show'])->name('events.show');
            Route::post('/events/{id}/join', [EventController::class, 'join'])->name('events.join');

                     
             
            
});