<?php

namespace App\Http\Controllers;


use App\Models\Setting;
use Session;
use App\Models\User;
use App\Models\Organization;
use App\Models\Donation;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Ocategory;
use App\Models\PaymentCategory;
use App\Models\OrganizationCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = User::where('type','!=',0)->count();
        $organization = Organization::count();
        $donations =  Donation::count();
        $pcategory = PaymentCategory::get();
        $positon =  OrganizationCategory::get(); 
        
        $ocategory = Ocategory::get();
        $category = Category::where('type',1)->count();
        
        return view('home')->with('user',$user)->with('organization',$organization)
        ->with('donations',$donations)->with('category',$category)->with('position',$positon)->with('ocategory',$ocategory)->with('pcategory',$pcategory);
    }

    public function settings(){
        $data = Setting::find(1);
        return view('settings')->with('data',$data);
    }
    
    /*preseident message*/
       public function president_message(){
           $data = Setting::find(1);
         return view('President.view')->with('data',$data);
       }
       
       public function president_message_store(Request $request){
            $data = Setting::find(1);
       if($request->hasfile('president_image')){
            $file=$request->file('president_image');
            $ext=$file->getClientOriginalExtension();
            $file_name='1'.time().'.'.$ext;
            $file->move('images',$file_name);
            $data->president_image = $file_name;
        }
        $data->president_name = $request->president_name;
        $data->president_description = $request->president_description;
       
        $data->save();

        Session::flash('flash_type','success');
        Session::flash('flash_message','Message Updated Successfully.');

        return back();
       }
    /*preseident message*/
    
    /*Slider start*/
    
    public function slider(){
        $data = Slider::get();
         return view('slider.view')->with('data',$data);
    }
    
    public function slider_store(Request $request){
        $data = new Slider();
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->image = $file_name;
        }
        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Slider Has been Created Suucessfully!');
        
        return back();
    }
   public function slider_delete($id){
       Slider::destroy();
        Session::flash('flash_type','success');
        Session::flash('flash_message','Slider Has been deleted Suucessfully!');
        
        return back();
   }
   
   public function slider_edit($id){
       $data = Slider::find($id);
       return view('slider.edit')->with('data',$data);
   }
   
   public function slider_update(Request $request){
     $data = Slider::find($request->id);
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->image = $file_name;
        }
        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Slider Has been Updated Suucessfully!');
        
        return redirect('/home/slider');  
   }
   
   /*Slider End*/
   
   
    /*Slider start*/
    
    public function testimonials(){
        $data = Testimonial::get();
         return view('testimonials.view')->with('data',$data);
    }
    
    public function testimonials_store(Request $request){
        $data = new Testimonial();
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->image = $file_name;
        }
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->description = $request->description;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Testimonials Has been Created Suucessfully!');
        
        return back();
    }
   public function testimonials_delete($id){
       Testimonial::destroy();
        Session::flash('flash_type','success');
        Session::flash('flash_message','Testimonials Has been deleted Suucessfully!');
        
        return back();
   }
   
   public function testimonials_edit($id){
       $data = Testimonial::find($id);
       return view('testimonials.edit')->with('data',$data);
   }
   
   public function testimonials_update(Request $request){
     $data = Testimonial::find($request->id);
       if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->image = $file_name;
        }
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->description = $request->description;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Slider Has been Updated Suucessfully!');
        
        return redirect('/home/testimonials');  
   }
   
   /*Slider End*/
   
    public function store(Request $request){
         
         $data = Setting::find(1);
       if($request->hasfile('about_us_image')){
            $file=$request->file('about_us_image');
            $ext=$file->getClientOriginalExtension();
            $file_name='1'.time().'.'.$ext;
            $file->move('images',$file_name);
            $data->about_us_image = $file_name;
        }
        $data->aboutus_title = $request->aboutus_title;
        $data->aboutus_description = $request->aboutus_description;
        $data->our_mission = $request->our_mission;
        $data->our_mission_description = $request->our_mission_description;
        $data->our_vission = $request->our_vission;
        $data->our_vission_description = $request->our_vission_description;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
         $data->green_title = $request->green_title;
         if($request->hasfile('green_image')){
            $files=$request->file('green_image');
            $exts=$files->getClientOriginalExtension();
            $file_names='2'.time().'.'.$exts;
            $files->move('images',$file_names);
            $data->green_image = $file_names;
        }
        
         $data->objective_title = $request->objective_title;
        $data->objective_description = $request->objective_description;
        
        $data->save();

        Session::flash('flash_type','success');
        Session::flash('flash_message','Settings Updated Successfully.');

        return back();
    }
}
