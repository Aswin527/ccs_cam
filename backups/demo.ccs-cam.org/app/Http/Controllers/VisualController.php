<?php

namespace App\Http\Controllers;

use App\Models\visual;
use DB;
use Illuminate\Http\Request;

class VisualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $result['product']=DB::table('products')->orderBy('name', 'ASC')->get();
        return view('visual.add',$result)->with('category',DB::table('categories')->where(['type'=>1,'status'=>1])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
      $res= new Visual();
      $res->name=$request->post('visuals');
      $request->validate([
           'visual' => 'mimes:jpg,jpeg,png|max:5000'
          ]);
      if($request->hasfile('image')){
        $file= $request->file('image');
        $ext=$file->getClientOriginalExtension();
        $file_name=time().''.$ext;
        $file->move('visual',$file_name);
        $res->image=$file_name;
      }else{
                  $res->image='';
      }
      $res->visualname=$request->post('visualname');
      $res->save();
      return redirect('/home/visual/view');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\visual  $visual
     * @return \Illuminate\Http\Response
     */
    public function show(visual $visual)
    {
        return view('visual.show')->with('gallery',Visual::paginate(10));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\visual  $visual
     * @return \Illuminate\Http\Response
     */
    public function edit(visual $visual,$id)
    {
        return view('visual.edit')->with('gallery',Visual::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\visual  $visual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, visual $visual,$id)
    {
         $res= Visual::find($id);
      $res->name=$request->post('visuals');
      $request->validate([
           'visual' => 'mimes:jpg,jpeg,png|max:5000'
          ]);
       if($request->hasfile('image')){
        $file= $request->file('image');
        $ext=$file->getClientOriginalExtension();
        $file_name=time().''.$ext;
        $file->move('visual',$file_name);
        $res->image=$file_name;
       }
      $res->visualname=$request->post('visualname');
      $res->save();
      return redirect('/home/visual/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\visual  $visual
     * @return \Illuminate\Http\Response
     */
    public function destroy(visual $visual,$id)
    {
        visual::destroy(array('id',$id));
        return back();
    }
}
