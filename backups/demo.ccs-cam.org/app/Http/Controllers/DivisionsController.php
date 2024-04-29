<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Slug;
use Illuminate\Http\Request;
use Session;

class DivisionsController extends Controller
{
    public function index(){
        return view('Division.index')
            ->with('divisions',Division::all());
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:100',
            'description' => 'required', 
            'meta_title'=>'required', 
            'meta_keyword'=>'required', 
            'meta_description'=>'required', 
            'slug'=>'required|unique:slugs',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:5000'
        ]);

        $image="";
        
        if($request->image!=NULL){
            $image=$request->image->store('Division');
        }

        $division=Division::create([
                'name' => $request->name,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'slug' => $request->slug,
                'image'=>$image
            ]);

        Slug::create([
            'slug' => $request->slug,
            'type' => 5,
            'slugid' => $division->id
        ]); 
        
        Session::flash('flash_type','success');
        Session::flash('flash_message','Division Created Successfully.');
        
        return redirect(url('/home/division/add'));
    }
    
    public function changestatus($did){
        $division=Division::where('id',$did)
            ->first();
        if($division->status==1){
            Division::where('id',$did)
                ->update([
                    "status" => 0
                ]);
            Session::flash('flash_type','danger');
            Session::flash('flash_message','Division Status changed to inactive.');
        }
        else{
            Division::where('id',$did)
                ->update([
                    "status" => 1
                ]);
                Session::flash('flash_type','success');
                Session::flash('flash_message','Division Status changed to active.');
        }

        return redirect(url('/home/division/add'));
    }

    public function edit($did){
        $division=Division::where('id',$did)
            ->first();

        return view('Division.edit')
            ->with('division',$division);
    }

    public function update(Request $request){
        $slug=Slug::where('slugid',$request->did)
            ->where('type',5)
            ->first();

        $this->validate($request,[
            'name' => 'required|max:100',
            'did' => 'required', 
            'description' => 'required', 
            'meta_title'=>'required', 
            'meta_keyword'=>'required', 
            'meta_description'=>'required', 
            'slug'=>'required|unique:slugs,slug,'.$slug->id,
        ]);

        if($request->image!=NULL){
            $this->validate($request,[
                'image' => 'mimes:jpg,jpeg,png|max:5000'
            ]);

            $image=$request->image->store('Division');

            Division::where('id',$request->did)
                ->update([
                    'image'=>$image
                ]);
        }

        Division::where('id',$request->did)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'slug' => $request->slug,
            ]);

        Slug::where('id',$slug->id)
            ->update([
                'slug' => $request->slug
            ]);
        
        Session::flash('flash_type','success');
        Session::flash('flash_message','Division Updated Successfully.');
        
        return redirect(url('/home/division/add'));
    }
}
