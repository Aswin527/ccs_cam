<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\User;
use Hash;
use Session;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;

class EnquirysController extends Controller
{
    public function store(Request $request){
        //dd($request->all());
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        
        Mail::to('vrovwenbiologics@gmail.com')
        ->send(new SendMailable($data));
        Session::flash('flash_type','success');
        Session::flash('flash_message','Thanku We have successfully registered your Enquiry !!');
        
        
        return view('PublicPages.contactus');
    }

    public function view(){
        return view('Enquiry.view')
            ->with('enquiries',Enquiry::orderBy('id','DESC')->paginate(20));
    }
     public function memnbershipuserstore(Request $request){
     //dd($request->all()); 
     if($request->member_status == 0){
         $member="New Member";
         $organization = $request->organization;
     }else{
         $member="Become Member";
         $organization =  $request->working_organization_name;
     }
     User::create([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'address' => $request->address,
            'gender' => $request->gender,
            'department' => $request->department,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpass' => $request->password,  
            'member_category' => $member,
            'dob' => $request->dob,
            // 'organization' => $request->working_organization_name,
            'organization' => $organization,
            'porganization' => $request->postion,
            'membership_number' => $request->membership_number,
            'status' => 0,
            'country'=>$request->country,
            'state'=>$request->state,

            
        ]);
        Session::flash('flash_type','success');
        Session::flash('flash_message','Thanku We have successfully registered your Enquiry !!');
        
        
        return back();
    }
}
