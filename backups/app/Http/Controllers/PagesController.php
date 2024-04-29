<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Slug;
use Session;

class PagesController extends Controller
{
    public function new(){
        return view('Page.add')
        ->with('categories',Category::where('status',1)->where('type',3)->get());
    }

    public function store(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'name'=>'required|max:255', 
            'slug'=>'required|max:255|unique:slugs',
            'category'=>'required',
            'description'=>'required',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:5000'
        ]);
        
        $image=$request->image->store('Pages');

        $page=Page::create([
                'name'=>$request->name, 
                'slug'=>$request->slug,
                'description'=>$request->description,
                'meta_title'=>$request->meta_title,
                'meta_keyword'=>$request->meta_keyword,
                'meta_description'=>$request->meta_description,
                'category_id' => $request->category,
                'image'=>$image
            ]);

        Slug::create([
            'slug' => $request->slug,
            'type' => 3,
            'slugid' => $page->id
        ]);
        
        Session::flash('flash_type','success');
        Session::flash('flash_message','Page Created Successfully.');
        
        return redirect(url('/home/pages/view'));
    }

    public function view(){
        return view('Page.view')
            ->with('pages',Page::with('category')->paginate(15));
    }

    public function edit($pid){
        $page=Page::with('category')
            ->where('id',$pid)
            ->first();

        if($page!==NULL)
        {
            return view('Page.edit')
                ->with('categories',Category::where('status',1)->where('type',3)->get())
                ->with('page',$page);
        }
        return abort(404);
    }

    public function update(Request $request){
        $slug=Slug::where('slugid',$request->pid)
            ->where('type',3)
            ->first();

        $this->validate($request,[
            'name'=>'required|max:255', 
            'slug'=>'required|max:255|unique:slugs,slug,'.$slug->id,
            'category'=>'required',
            'description'=>'required',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required'
        ]);

        if($request->image!=NULL){
            $this->validate($request,[
                'image' => 'mimes:jpg,jpeg,png|max:5000'
            ]);
            $image=$request->image->store('Pages');
            Page::where('id',$request->pid)
            ->update([
                'image'=>$image
            ]);
        }

        Page::where('id',$request->pid)
            ->update([
                "name" => $request->name,
                "slug" => $request->slug,
                'description'=>$request->description,
                "meta_title" => $request->meta_title,
                "meta_keyword" => $request->meta_keyword,
                "meta_description" => $request->meta_description,
                'category_id' => $request->category,
            ]);

        Slug::where('id',$slug->id)
            ->update([
                'slug' => $request->slug
            ]);

        Session::flash('flash_type','success');
        Session::flash('flash_message','Page Updated Successfully.');
        
        return redirect('/home/pages/view');
    }

    public function changestatus($pid){
        $page=Page::where('id',$pid)
            ->first();

        if($page->status==1){
            Page::where('id',$pid)
                ->update([
                    "status" => 0
                ]);
            Session::flash('flash_type','danger');
            Session::flash('flash_message','Page Status changed to inactive.');
        }
        else{
            Page::where('id',$pid)
                ->update([
                    "status" => 1
                ]);

            Session::flash('flash_type','success');
            Session::flash('flash_message','Page Status changed to active.');
        }

        return redirect(url('/home/pages/view'));
    }
}
