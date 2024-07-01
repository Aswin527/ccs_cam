<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Slug;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;

class CategoriesController extends Controller
{
    public function new(){
        return view('Category.add');
    }
    
    public function welcome(){
       $cat = Category::where('status',1)->get();
       $slider = Slider::get();
       $categroy = Category::whereIn('status',[2,4])->get();
       $setting = Setting::find(1);
       $testimonials = Testimonial::get();
       $gallery = Gallery::get();
       $event = Event::get();
       $project = Projects::get();
       return view('welcome')->with('cat',$categroy)
       ->with('proc',$cat)->with('slider',$slider)->with('setting',$setting)->with('testimonial',$testimonials)->with('gallery',$gallery)->with('events',$event)->with('project',$project);
    }

    public function store(Request $request){
     //dd($request->all());
        $this->validate($request,[
            'name'=>'required|max:100', 
           
            'description' => 'nullable',
            
            'image' => 'nullable|mimes:jpg,jpeg,png|max:5000'
        ]);
        
        $image="";
        if($request->image!=NULL){
           $image=$request->image->move('Category');
        }
        

        $category=Category::create([
                'name'=>$request->name, 
               
                'type'=>$request->type,
                'volume'=>$request->volume,
                'volume'=>$request->volume,
                'date'=>$request->date,
                'issue'=>$request->issue,
                'pdf'=>$request->pdf, 
                
                'image'=>$image
            ]);

             
        
        Session::flash('flash_type','success');
        Session::flash('flash_message','Publication Created Successfully.');
        
        return redirect(url('/home/categories/view'));
    }

    public function view(){
         return view('Category.view')
            ->with('categories',Category::paginate(15));
       
    }

    public function edit($cid){
        $category=Category::where('id',$cid)
            ->first();

        return view('Category.edit')
            ->with('category',$category);
    }

    public function update(Request $request){

      

       

        if($request->image!=NULL){
            $this->validate($request,[
                'image' => 'mimes:jpg,jpeg,png|max:5000'
            ]);

            $image=$request->image->move('Category');

            Category::where('id',$request->cid)
                ->update([
                    'image'=>$image
                ]);
        }
        

        Category::where('id',$request->cid)
            ->update([
                "name" => $request->name,
                "issue" => $request->issue,
                'description'=>$request->description,
               'pdf'=>$request->pdf,
                'volume'=>$request->volume,
                'date'=>$request->date,
                'type'=>$request->type,
            ]);

       

        Session::flash('flash_type','success');
        Session::flash('flash_message','Publication Updated Successfully.');
        
        return redirect(url('/home/categories/view'));
    }
   public function destroy($id){
       Category::destroy($id);
       Session::flash('flash_type','success');
        Session::flash('flash_message','Publication Deleted Successfully.');
        
        return redirect(url('/home/categories/view'));
   }
    public function changestatus($cid){
        $category=Category::where('id',$cid)
            ->first();
        if($category->status==1){
            Category::where('id',$cid)
                ->update([
                    "status" => 0
                ]);
            Session::flash('flash_type','danger');
            Session::flash('flash_message','Publication Status changed to inactive.');
        }
        else{
            Category::where('id',$cid)
                ->update([
                    "status" => 1
                ]);
                Session::flash('flash_type','success');
                Session::flash('flash_message','Publication Status changed to active.');
        }

        return redirect(url('/home/categories/view'));
    }
}
