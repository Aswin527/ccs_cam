<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Session;

class GallerysController extends Controller
{
    public function new(){
        return view('Gallery.add')
        ->with('data',Gallery::get());
    }

    public function store(Request $request){
        //dd($request->all());
        $data = new Gallery;
       if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name='1'.time().'.'.$ext;
            $file->move('images',$file_name);
            $data->image = $file_name;
        }
        $data->name = $request->name;
    
        
        $data->save();

        Session::flash('flash_type','success');
        Session::flash('flash_message','Gallery Created Successfully.');

        return back();
        
    }

    public function view(){
        return view('Gallery.view')
            ->with('gallery',Gallery::with('category')->paginate(15));
    }

    public function changestatus($gid){
        $gallery=Gallery::where('id',$gid)
            ->first();

        if($gallery->status==1){
            Gallery::where('id',$gid)
                ->update([
                    "status" => 0
                ]);
            Session::flash('flash_type','danger');
            Session::flash('flash_message','Image Status changed to inactive.');
        }
        else{
            Gallery::where('id',$gid)
                ->update([
                    "status" => 1
                ]);

            Session::flash('flash_type','success');
            Session::flash('flash_message','Image Status changed to active.');
        }

        return redirect(url('/home/gallery/view'));
    }

    public function edit($gid){
        $gallery=Gallery::where('id',$gid)
            ->first();

        if($gallery!==NULL)
        {
            return view('Gallery.edit')
                ->with('categories',Category::where('status',1)->where('type',4)->get())
                ->with('gallery',$gallery);
        }
        return abort(404);
    }

    public function update(Request $request){
         $data =  Gallery::find($request->id);
       if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name='1'.time().'.'.$ext;
            $file->move('images',$file_name);
            $data->image = $file_name;
        }
        $data->name = $request->name;
    
        
        $data->save();

        Session::flash('flash_type','success');
        Session::flash('flash_message','Gallery Updated Successfully.');

       
        
        return redirect('/home/gallery/add');
    }
}
