<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\CategoryBlog;
use Session;
use App\Models\Slug;
use Auth;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function new(){
        return view('Blog.add')
        ->with('categories',Category::where('status',1)->where('type',2)->get());
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
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images/blog',$file_name);
              $blog=Blog::create([
            'name'=>$request->name, 
            'slug'=>$request->slug,
            'description'=>$request->description,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'image'=>$file_name
        ]);
            
        }else{
            $blog=Blog::create([
            'name'=>$request->name, 
            'slug'=>$request->slug,
            'description'=>$request->description,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'image'=>''
        ]);
        }
        
        

        
        
        //dd($product->id);
        foreach($request->category as $item){
            CategoryBlog::create([
                'blog_id' => $blog->id,
                'category_id' => $item
            ]);
        }

        Slug::create([
            'slug' => $request->slug,
            'type' => 2,
            'slugid' => $blog->id
        ]);  
        
        Session::flash('flash_type','success');
        Session::flash('flash_message','Blog Created Successfully.');
        
        return redirect(url('/home/blogs/view'));
    }

    public function view(){
        return view('Blog.view')
            ->with('blogs',Blog::with('categories')->paginate(15));
    }

    public function edit($bid){
        $blog=Blog::with('categories')
            ->where('id',$bid)
            ->first();
        if($blog!==NULL)
        {
            return view('Blog.edit')
                ->with('categories',Category::where('status',1)->get())
                ->with('blog',$blog);
        }
        return abort(404);
    }

    public function update(Request $request){
        $slug=Slug::where('slugid',$request->bid)
            ->where('type',2)
            ->first();

        $this->validate($request,[
            'name'=>'required|max:255', 
            'slug'=>'required|max:255|unique:slugs,slug,'.$slug->id,
            'category'=>'required',
            'description'=>'required',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'image' => 'mimes:jpg,jpeg,png|max:5000'
        ]);
            if($request->hasfile('image')){
              $file=$request->file('image');
              $ext=$file->getClientOriginalExtension();
              $file_name=time().'.'.$ext;
             // $file->move('Blogs',$file_name);
              $file->move('images/blog', $file_name);
            Blog::where('id',$request->bid)
            ->update([
                'image'=>$file_name
            ]);
             }
            
        Blog::where('id',$request->bid)
            ->update([
                "name" => $request->name,
                "slug" => $request->slug,
                'description'=>$request->description,
                "meta_title" => $request->meta_title,
                "meta_keyword" => $request->meta_keyword,
                "meta_description" => $request->meta_description,
                
            ]);

        CategoryBlog::where('blog_id',$request->bid)
            ->delete();
            
        foreach($request->category as $item){
            CategoryBlog::create([
                'blog_id' => $request->bid,
                'category_id' => $item
            ]);
        }

        Slug::where('id',$slug->id)
            ->update([
                'slug' => $request->slug
            ]);
            
        Session::flash('flash_type','success');
        Session::flash('flash_message','Blog Updated Successfully.');
        
        return redirect(url('/home/blogs/view'));
    }

    public function changestatus($bid){
        $blog=Blog::where('id',$bid)
            ->first();
        if($blog!=NULL){
            if($blog->status==1){
                Blog::where('id',$bid)
                    ->update([
                        "status" => 0
                    ]);
                Session::flash('flash_type','danger');
                Session::flash('flash_message','Blog Status changed to inactive.');
            }
            elseif($blog->status==0){
                Blog::where('id',$bid)
                    ->update([
                        "status" => 1
                    ]);
                Session::flash('flash_type','success');
                Session::flash('flash_message','Blog Status changed to active.');
            }
        }
        else{
            Session::flash('flash_type','danger');
            Session::flash('flash_message','Blog not found.');
        }

        return redirect(url('/home/blogs/view'));
    }
}
