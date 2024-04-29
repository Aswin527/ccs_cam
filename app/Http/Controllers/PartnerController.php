<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\CategoryBlog;
use App\Models\Partner;
use Session;
use App\Models\Slug;
use Auth;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function view(){
        $partner = Partner::get();
        return view('partner.view')
        ->with('partner',$partner);
    }
    
    public function store(Request $request){
        $data = new Partner();
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->image = $file_name;
        }
        $data->name = $request->title;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Our Partner Has been Created Suucessfully!');
        
        return back();
        
    }
    
    public function destroy($id){
        Partner::destroy($id);
        Session::flash('flash_type','success');
        Session::flash('flash_message','Our Partner Has been Deleted Suucessfully!');
        
        return back();
    }
    
    public function edit($id){
        $partner = Partner::find($id);
        return view('partner.edit')
       ->with('partner',$partner);
    }
    public function update(Request $request){
     $data = Partner::find($request->id);
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->image = $file_name;
        }
        $data->name = $request->title;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Our Partner Has been Updated Suucessfully!');
        
        return redirect('/admin/our/partner');   
    }
}