<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Position;
use App\Models\Country;
use App\Models\OrganizationCategory;
use App\Models\Organization;
use App\Models\Donation;
use App\Models\PaymentCategory;
use App\Models\Event;  
use App\Models\Ocategory;
use App\Models\AdminBank;
use App\Models\Education;  
use App\Models\Voucher;
use App\Models\State;
use App\Models\Currency;
use App\Models\Video;
use Illuminate\Http\Request;
use Session;

use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function new(){
        return view('Users.add');
    }
    
    public function profiles(){
        if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        $organization= Organization::get();
        $category= OrganizationCategory::get();
        $position = Position::get();
        $country = Country::get();
        $education = Education::get();
        // return view('loginuser.profile')->with('country',$country)->with('organization',$organization)->with('category',$category)
        // ->with('position',$position)->with('education',$education);
        return view('loginuser.userprofile')->with('country',$country)->with('organization',$organization)->with('category',$category)
        ->with('position',$position)->with('education',$education);
        
    }

    public function edit_profiles(){
        if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        $organization= Organization::get();
        $category= OrganizationCategory::get();
        $position = Position::get();
        $country = Country::get();
        $education = Education::get();
        return view('loginuser.profile')->with('country',$country)->with('organization',$organization)->with('category',$category)
        ->with('position',$position)->with('education',$education);
     
        
    }
    
    public function userlogout(){
        Auth::logout();
        return redirect('/login');
    }
    
    public function userorganization(){
        if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        $organization = Organization::where('user_id',Auth::user()->id)->first();
        $country = Country::get();
         $category =  OrganizationCategory::get();
         $state =  State::get();
        return view('loginuser.organization')->with('category',$category)->with('country',$country)->with('state',$state)->with('organization',$organization);
    }
    
    public function updateorganization(Request $request){
       if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        
        
        //dd($request->all());
        $data =  Organization::where('user_id',Auth::user()->id)->first();
        if($data){
            $data =  Organization::where('user_id',Auth::user()->id)->first();
        }else{
            $data = new Organization();
        }
       //dd($data);
       $data->organization_name = $request->organization_name;
        $data->user_id = Auth::user()->id;
       $data->country = $request->country;
       $data->state = $request->state;
       $data->organizaion_category = $request->organizaion_category;
       $data->organization_email = $request->organization_email;
       $data->organizaton_phone = $request->organizaton_phone;
       $data->website = $request->website;
       $data->status = 0;
       $data->authorize_person = $request->authorize_person;
       $data->authorize_phone = $request->authorize_phone;
       $data->organization_regidtartioin_number = $request->organization_regidtartioin_number;
       $data->authorize_phone = $request->authorize_phone;
       if($request->hasfile('organization_registration_certificate')){
            $file=$request->file('organization_registration_certificate');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->organization_registration_certificate = $file_name;
        }
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Oragnization Has Been Created Successfully! Admin Approvel Pending');
        
        return back();
        
        
    }
    
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)
                                ->get();
  
        return response()->json($data);
    }
    
    public function updateprofiles(Request $request){
        if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        $data = User::find(Auth::user()->id);
         if($request->state == null){
             $state = $data->state;
         }else{
              $state = $request->state;
         }
         $data->firstname = $request->fname;
        $data->lastname = $request->lname;
        $data->mobile = $request->phone_number;
         $data->country = $request->country;
        $data->state = $state;
        $data->nationality = $request->nationality;  
        $data->porganization = $request->porganization;
        $data->norganization = $request->norganization;
        
        
        $data->membership_id = $request->membership_id;
        $data->bank_name = $request->bank_name;
        $data->bank_holder_name = $request->bank_holder_name;
        $data->ifsc_code = $request->ifsc_code;
        $data->swift_code = $request->swift_code;
        $data->ban_number = $request->ban_number;
        $data->account_number = $request->account_number;
        
        $data->qualification = $request->qualification;
        
        $data->gender = $request->gender; 
        $data->organization = $request->organization;
       
        $data->dob = $request->dob; 
        $data->national_id = $request->national_id; 
        
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->photo = $file_name;
        }
        if($request->hasfile('national_photo')){
            $files=$request->file('national_photo');
            $exts=$files->getClientOriginalExtension();
            $file_names='1'.time().'.'.$exts;
            $files->move('images',$file_names);
            $data->national_photo = $file_names;
        }
        
        $data->save();
             Session::flash('flash_type','success');
             Session::flash('flash_message','Profile Updated Successfully!');
             return back(); 
    }
    
    

    public function store(Request $request){
        $this->validate($request,[
            'firstname'=>'required|string|max:255',
            'lastname'=>'required|string|max:255',
            'email'=>'required|string|max:255|email|unique:users',
            'password'=>'required|string|min:8',
            'mobile'=>'required|string|min:10',
        ]);

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
        ]);

        Session::flash('flash_type','success');
        Session::flash('flash_message','Account Created Successfully. Email:'.$request->email.' , Password:'.$request->password);
        
        return redirect(url('/home/users/view'));
    }

    public function view(){
        return view('Users.view')
            ->with('users',User::where('id','!=',Auth::User()->id)->paginate(15));
    }

    public function changestatus($uid){
        $user=User::where('id',$uid)
            ->first();
        if($user->status==1){
            User::where('id',$uid)
                ->update([
                    "status" => 0
                ]);
            Session::flash('flash_type','danger');
            Session::flash('flash_message','User Status changed to inactive.');
        }
        else{
            User::where('id',$uid)
                ->update([
                    "status" => 1
                ]);
            Session::flash('flash_type','success');
            Session::flash('flash_message','User Status changed to active.');
        }

        return redirect(url('/home/users/view'));
    }

    public function profile(){
        return view('Users.profile');
    }

    public function updateprofile(Request $request){
        $this->validate($request,[
            'firstname'=>'required|string|max:255',
            'lastname'=>'required|string|max:255',
            'mobile'=>'required|string|min:10',
        ]);

        User::where('id',Auth::User()->id)
        ->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mobile' => $request->mobile,
        ]);

        Session::flash('flash_type','success');
        Session::flash('flash_message','Account Updated Successfully.');
        
        return redirect(url('/home'));
    }

    public function changepassword(Request $request){
        $this->validate($request,[
            'oldpassword'=>'required|string|min:8|password:web',
            'password'=>'required|string|min:8|confirmed'
        ]);

        Auth::User()->update([
            'password' => Hash::make($request->password)
        ]);

        Session::flash('flash_type','success');
        Session::flash('flash_message','Password Updated Successfully.');
        
        return redirect(url('/home'));
    }
    
    /*member start*/
    public function member(){
        $country = Country::get();
        $position = Position::get();
        $category =  OrganizationCategory::get();
        $organization =  Organization::get();
        $education = Education::get();
       return view('Member.add')->with('position',$position)->with('category',$category)->with('country',$country)->with('organization',$organization)->with('education',$education); 
    }
    
    public function membershow($id){
        $user = User::find($id);
        $data = Donation::where('user_id',$id)->get();
        return view('Member.show')->with('user',$user)->with('payments',$data);
    }
    
    
    public function storemember(Request $request){
        $this->validate($request,[
           
            'email'=>'required|string|max:255|email|unique:users',
           
        ]);
        $data = new User();
        $data->firstname = $request->fname;
        $data->lastname = $request->lname;
        $data->mobile = $request->phone_number;
        $data->email  = $request->email;
        $data->password = Hash::make($request->password);
        $data->gender = $request->gender;
        
        $data->country = $request->country;
        $data->state = $request->state;
        $data->nationality = $request->nationality;
        
        $data->membership_id = $request->membership_id;
        $data->bank_name = $request->bank_name;
        $data->bank_holder_name = $request->bank_holder_name;
        $data->ifsc_code = $request->ifsc_code;
        $data->swift_code = $request->swift_code;
        $data->ban_number = $request->ban_number;
        $data->account_number = $request->account_number;
       
        $data->dob = $request->dob; 
        $data->national_id = $request->national_id; 
        $data->member_category = $request->member_category;
        // $data->organization_category = $request->organization_category;
        // $data->norganization = $request->norganization;
        // $data->porganization = $request->porganization;
        
         $data->porganization = $request->porganization;
        $data->norganization = $request->norganization;
        
        $data->qualification = $request->qualification;
        
        $data->organization = $request->organization;
        
        
        $data->cpass = $request->password;
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->photo = $file_name;
        }
        if($request->hasfile('national_photo')){
            $files=$request->file('national_photo');
            $exts=$files->getClientOriginalExtension();
            $file_names='1'.time().'.'.$exts;
            $files->move('images',$file_names);
            $data->national_photo = $file_names;
        }
         $data->status =1;
         $data->type =1;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Member Created Successfully.');
        
        
        return back();
    }
    
    public function memberupdate(Request $request){
        $data = User::find($request->id);
        if($request->state == null){
             $state = $data->state;
         }else{
              $state = $request->state;
         }
        $data->firstname = $request->fname;
        $data->lastname = $request->lname;
        $data->mobile = $request->phone_number;
        $data->email  = $request->email;
        
        $data->gender = $request->gender;
       
        $data->dob = $request->dob;
        $data->country = $request->country;
        $data->state = $state;
        $data->nationality = $request->nationality;
        
        $data->national_id = $request->national_id;
        // $data->norganization = $request->norganization;
        // $data->porganization = $request->porganization;
        // $data->member_category = $request->member_category;
         $data->porganization = $request->porganization;
        $data->norganization = $request->norganization;
        
        $data->membership_id = $request->membership_id;
        $data->bank_name = $request->bank_name;
        $data->bank_holder_name = $request->bank_holder_name;
        $data->ifsc_code = $request->ifsc_code;
        $data->swift_code = $request->swift_code;
        $data->ban_number = $request->ban_number;
        $data->account_number = $request->account_number;
        
        
        $data->qualification = $request->qualification;
        
        $data->organization = $request->organization;
        
        $data->cpass = $request->password;
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $file->move('images',$file_name);
            $data->photo = $file_name;
        }
        if($request->hasfile('national_photo')){
            $files=$request->file('national_photo');
            $exts=$files->getClientOriginalExtension();
            $file_names='1'.time().'.'.$exts;
            $files->move('images',$file_names);
            $data->national_photo = $file_names;
        }
         
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Member Updated Successfully.');
        
        
        return redirect('/home/view/member');
    }
    public function statuschange($id , $status){
        $data = User::find($id);
        $data->status = $status;
        $data->save();
        
        Session::flash('flash_type','success');
        Session::flash('flash_message','Status Has been Changed');
        
        
        return back();
    }
    public function viewmember(){
        $partner =  User::where('type','!=',0)->orderBy('id','DESC')->get();
         return view('Member.view')->with('partner',$partner);
    }
    
    public function memberdelete($id){
      User::destroy($id);
      Session::flash('flash_type','success');
        Session::flash('flash_message','Member Deleted Successfully.');
        
        
        return back();
    }
    
    public function memberedit($id){
         $country = Country::get();
        $data = User::find($id);
        $category =  OrganizationCategory::get();
        $partner =  Position::get();
        $organization =  Organization::get();
         $education = Education::get();
        return view('Member.edit')->with('data',$data)->with('position',$partner)->with('category',$category)->with('country',$country)->with('organization',$organization)->with('education',$education);
    }
    
    
    /*Member End*/
    
    /*Organization Position start*/ 
    public function organization_positions(){
       $partner =  Position::get();
         return view('Organization.add')->with('partner',$partner);
    }
    public function organization_positions_store(Request $request){
        $data = new Position();
        $data->name = $request->position;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Organization Position Created Successfully.');
        
        return back();
    }
    
    public function organization_positions_delete($id){
        Position::destroy($id);
        Session::flash('flash_type','success');
        Session::flash('flash_message','Organization Position Delete Successfully.');
        
        return back();
    }
    public function organization_positions_edit($id){
        $data = Position::find($id);
         return view('Organization.edit')->with('data',$data);
    }
    public function  organization_positions_update(Request $request){
        $data = Position::find($request->id);
         $data->name = $request->position;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Organization Position Created Successfully.');
        
        return redirect('/home/organization/position');
    }
    /*Organizatioin Position end*/
    
    
    
    
    
    /*Organization Category start*/ 
    public function organization_category_positions(){
       $partner =  OrganizationCategory::get();
         return view('OrganizationCategory.add')->with('partner',$partner);
    }
    public function organization_positions_category_store(Request $request){
        $data = new OrganizationCategory();
        $data->name = $request->position;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Organization Category Created Successfully.');
        
        return back();
    }
    
    public function organization_positions_category_delete($id){
        OrganizationCategory::destroy($id);
        Session::flash('flash_type','success');
        Session::flash('flash_message','Organization Category Delete Successfully.');
        
        return back();
    }
    public function organization_positions_category_edit($id){
        $data = OrganizationCategory::find($id);
         return view('OrganizationCategory.edit')->with('data',$data);
    }
    public function  organization_positions_category_update(Request $request){
        $data = OrganizationCategory::find($request->id);
         $data->name = $request->position;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Organization Category Created Successfully.');
        
        return redirect('/home/organization/cateory/position');
    }
    /*Organizatioin Position end*/
    
     /*Organization Category start*/ 
    public function organization_ocategory_positions(){
       $partner =  Ocategory::get();
         return view('ocategory.add')->with('partner',$partner);
    }
    public function organization_positions_ocategory_store(Request $request){
        $data = new Ocategory();
        $data->name = $request->position;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Organization Category Created Successfully.');
        
        return back();
    }
    
    public function organization_positions_ocategory_delete($id){
        Ocategory::destroy($id);
        Session::flash('flash_type','success');
        Session::flash('flash_message','Organization Category Delete Successfully.');
        
        return back();
    }
    public function organization_positions_ocategory_edit($id){
        $data = Ocategory::find($id);
         return view('ocategory.edit')->with('data',$data);
    }
    public function  organization_positions_ocategory_update(Request $request){
        $data = Ocategory::find($request->id);
         $data->name = $request->position;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Organization Category Created Successfully.');
        
        return redirect('/home/ocateory/position');
    }
    /*Organizatioin Position end*/
    
    
    
    /* Organization start*/
    
    public function organization(){
        $category =  Ocategory::get();
         $country =  Country::get();
         $partner =  User::where('type','!=',0)->get();
        return view('Org.add')->with('category',$category)->with('partner',$partner)->with('country',$country);
    }
    
    public function organization_store(Request $request){
       $data =  new Organization();
       $data->user_id = $request->user_id;
       $data->organization_name = $request->organization_name;
       $data->country = $request->country;
       $data->state = $request->state;
       $data->organizaion_category = $request->organizaion_category;
       $data->organization_email = $request->organization_email;
       $data->organizaton_phone = $request->organizaton_phone;
       $data->website = $request->website;
       $data->authorize_person = $request->authorize_person;
       $data->authorize_email = $request->authorize_email;
       $data->authorize_phone = $request->authorize_phone;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Oragnization Has Been Created Successfully!');
        
        return back();
    }
    
    public function organizationview(){
        $data = Organization::orderby('id','DESC')->get();
        return view('Org.view')->with('data',$data);
    }
    
    public function organizationdelete($id){
         Organization::destroy($id);
         Session::flash('flash_type','success');
        Session::flash('flash_message','Oragnization Has Been Deleted Successfully!');
        
        return back();
    }
    
    public function organizationedit($id){
        $category =  Ocategory::get();
         $country =  Country::get();
         $partner =  User::where('type','!=',0)->get();
        $data = Organization::find($id);
        return view('Org.edit')->with('data',$data)
        ->with('category',$category)
        ->with('partner',$partner)
        ->with('country',$country);
    }
    
    public function organizationshow($id)
    {
       $data = Organization::find($id);
       $user = User::where('organization',$id)->get();
        return view('Org.show')->with('data',$data)->with('user',$user);
    }
    
    public function organizationupdate(Request $request){
        $data =  Organization::find($request->id);
        if($request->state == null){
             $state = $data->state;
         }else{
              $state = $request->state;
         }
       $data->user_id = $request->user_id;
       $data->organization_name = $request->organization_name;
       $data->country = $request->country;
        $data->state = $state;
       $data->organizaion_category = $request->organizaion_category;
       $data->organization_email = $request->organization_email;
       $data->organizaton_phone = $request->organizaton_phone;
       $data->website = $request->website;
       $data->authorize_person = $request->authorize_person;
       $data->authorize_email = $request->authorize_email;
       $data->authorize_phone = $request->authorize_phone;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Oragnization Has Been Created Successfully!');
        
        return redirect('home/organization/view');
    }
    
    /*Organization End*/
    
    
    
    /*Organization Category start*/ 
    public function country(){
       $partner =  Country::get();
         return view('country.add')->with('partner',$partner);
    }
    public function country_store(Request $request){
        $data = new Country();
        $data->name = $request->position;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Country Created Successfully.');
        
        return back();
    }
    
    public function country_delete($id){
        Country::destroy($id);
        Session::flash('flash_type','success');
        Session::flash('flash_message','Country Delete Successfully.');
        
        return back();
    }
    public function country_edit($id){
        $data = Country::find($id);
         return view('country.edit')->with('data',$data);
    }
    public function  country_update(Request $request){
        $data = Country::find($request->id);
         $data->name = $request->position;
        $data->save();
         Session::flash('flash_type','success');
        Session::flash('flash_message','Country Created Successfully.');
        
        return redirect('/home/country');
    }
    /*Organizatioin Position end*/
    
    
    /*Donation start*/
     public function donations(Request $request){
        if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        $data = Donation::where('user_id',Auth::user()->id)->get();
        $category = PaymentCategory::get();
        $currency = Currency::get();
      return view('loginuser.donation.view')->with('data',$data)->with('category',$category)->with('currency',$currency);  
     }
     
     
     public function donations_show($id){
         $data = Donation::find($id);
         $user = User::find($data->user_id);
          $currency =  Currency::find($data->currency);
         return view('donation.show')->with('data',$data)->with('currency',$currency)->with('user',$user);
     }
     
     
     
     public function all_paymenst(){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
          $data = Donation::get();
         return view('donation.view')->with('data',$data);
     }
     
     public function status_payments(Request $request){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
          Donation::where('id',$request->id)->update([
              'status'=>$request->status
              ]);
              Session::flash('flash_type','success');
        Session::flash('flash_message','Status Has been Changed');
        
        return back();
     }
     
     public function donation_store(Request $request){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        $data = new Donation();
        $data->user_id = Auth::user()->id;
        $data->amount = $request->amount;
        $data->donation_type = $request->donation_type;
        
        $data->remark = $request->remark;
        $data->currency = $request->currency;
         if($request->hasfile('transection')){
            $files=$request->file('transection');
            $exts=$files->getClientOriginalExtension();
            $file_names='1'.time().'.'.$exts;
            $files->move('images',$file_names);
            $data->transection = $file_names;
        }
        //$data->transection = $request->transection;
        
        $data->save();
         Session::flash('flash_type','danger');
            Session::flash('flash_message','Donation Send Successfull! Admin Approvel Pending!');
            return back(); 
     }
     
     public function donations_edit($id){
        if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        
        $data = Donation::find($id);
         $category = PaymentCategory::get();
        $currency = Currency::get();
         return view('donation.edit')->with('data',$data)
         ->with('category',$category)->with('currency',$currency);;
     }
     
     public function donations_update(Request $request){
        if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        
        $data =Donation::find($request->id);
        $data->amount = $request->amount;
        $data->donation_type = $request->donation_type;
        
        $data->remark = $request->remark;
        $data->currency = $request->currency;
        $data->being = $request->being;
         
        //$data->transection = $request->transection;
        
        $data->save();
         Session::flash('flash_type','danger');
            Session::flash('flash_message','Receipt Updated Successfull! ');
            return redirect('/home/user/all/payments'); 
     }
     
    /*Donation End*/
    
    
    /*Membership card*/
      public function membershipcard(){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        return view('loginuser.membershipcard');
      }
    /*Membership End*/
    
    
    /*Events Starts*/
      public function events(){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        $event = Event::orderBy('id','DESC')->get();
         return view('events.view')->with('event',$event);
      }
      public function add_events(){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
      
         return view('events.create');
      }
      
      public function eventsstore(Request $request){
        if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }  

        $data = new Event();
        $data->event_name = $request->event_name;
        $data->location_event = $request->location_event;
        $data->about_event = $request->about_event;
        $data->date = $request->date;
        $data->iframe = $request->iframe;
       
        if($request->hasfile('image_event')){
            $files=$request->file('image_event');
            $exts=$files->getClientOriginalExtension();
            $file_names='1'.time().'.'.$exts;
            $files->move('images',$file_names);
            $data->image_event = $file_names;
        }
         
        $data->save();
        Session::flash('flash_type','success');
            Session::flash('flash_message','Events Created Successfully!');
        return back(); 
      }
      
      public function eventsdelete($id){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
          Event::destroy($id);
          Session::flash('flash_type','warning');
            Session::flash('flash_message','Events Deleted Successfully!');
         return back(); 
      }
      
      public function eventsedit($id){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        $data = Event::find($id);
        
        return view('events.edit')->with('data',$data);
      }
      
      public function eventsupdate(Request $request){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }  

        $data = Event::find($request->id);
        $data->event_name = $request->event_name;
        $data->location_event = $request->location_event;
        $data->about_event = $request->about_event;
        $data->date = $request->date;
        $data->iframe = $request->iframe;
       
        if($request->hasfile('image_event')){
            $files=$request->file('image_event');
            $exts=$files->getClientOriginalExtension();
            $file_names='1'.time().'.'.$exts;
            $files->move('images',$file_names);
            $data->image_event = $file_names;
        }
         
        $data->save();
        Session::flash('flash_type','success');
            Session::flash('flash_message','Events Updated Successfully!');
        return redirect('/home/events'); 
      }
      
      
    /*Events End*/
    
    /*Video Start*/
       public function video(Request $request){
           if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
           $video = Video::get();
          return view('video.view')->with('video',$video);
       }
       public function videostore(Request $request){
           if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
           $data = new Video();
            $data->iframe = $request->iframe;
            $data->title = $request->title;
           $data->save();
            Session::flash('flash_type','success');
            Session::flash('flash_message','Video Created Successfully!');
        return back(); 
       }
       
       public function videodelete($id){
           if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
           Video::destroy($id);
            Session::flash('flash_type','danger');
            Session::flash('flash_message','Video Deleted Successfully!');
        return back(); 
       }
    /*Video End*/
    
    
    /*education qualification start*/
       public function education_qualification(){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        
        $data = Education::get();
        return view('qualification.view')->with('data',$data);
        
       }
       
       public function education_qualification_store(Request $request){
           if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
           $data = new Education();
           $data->education = $request->education;
           $data->save();
            Session::flash('flash_type','success');
            Session::flash('flash_message','Education Qualification Created Succesfully!');
        return back(); 
       }
       
       public function education_qualification_delete($id){
           if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
          Education::destroy($id); 
          Session::flash('flash_type','danger');
            Session::flash('flash_message','Education Qualification Deleted Succesfully!');
        return back();
       }
    /*education qualification end*/
    
    public function organization_category(){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        
        return view('Organization.category');
    }
    
    public function organization_category_store(){
       if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }  
    }
    
    
    /*Payment category start*/
      public function payment_category(){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        $data = PaymentCategory::get();
        return view('PaymentCategory.view')->with('data',$data);
      }
      
      public function payment_category_store(Request $request){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        $data = new PaymentCategory();
        $data->name = $request->name;
        $data->save();
        
            Session::flash('flash_type','success');
            Session::flash('flash_message','Payment Category Created Successfully!');
            return back();  
      }
      
     public function payment_category_delete($id){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
         PaymentCategory::destroy($id);
        Session::flash('flash_type','danger');
            Session::flash('flash_message','Payment Category Deleted Successfully!');
            return back();
       }      
    /*payment category end*/
    
    
    
    /*currency category start*/
      public function currency_category(){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
        $data = Currency::orderBy('id','DESC')->get();
        return view('Currency.view')->with('data',$data);
      }
      
      public function currency_category_store(Request $request){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }
       $data = new Currency();
       $data->name = $request->name;
       $data->value = $request->value;
        $data->save();
        
            Session::flash('flash_type','success');
            Session::flash('flash_message','Currency Created Successfully!');
            return back();  
      }
    /*currency category end*/
    
    
    /*bank category start*/
       public function bank_category(){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        $data = AdminBank::get();
        return view('bank.view')->with('data',$data);
      }
      
      public function bank_category_store(Request $request){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        $data = new AdminBank();
        $data->bank_name = $request->bank_name;
        $data->holder_name = $request->holder_name;
        $data->account_number = $request->account_number;
        $data->ifsc_code = $request->ifsc_code;
        $data->iban_number = $request->iban_number;
        $data->swift_code = $request->swift_code;
        $data->save();
        
            Session::flash('flash_type','success');
            Session::flash('flash_message','Bank Created Successfully!');
            return back(); 
      }
      public function bank_category_delete($id){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        AdminBank::destroy($id);
        Session::flash('flash_type','danger');
            Session::flash('flash_message','Bank Deleted Successfully!');
            return back(); 
      }
      
      public function bank_category_edit($id){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }  
         $data = AdminBank::find($id);
         return view('bank.edit')->with('data',$data);
      }
      
      public function bank_category_update(Request $request){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        $data = AdminBank::find($request->id);
        $data->bank_name = $request->bank_name;
        $data->holder_name = $request->holder_name;
        $data->account_number = $request->account_number;
        $data->ifsc_code = $request->ifsc_code;
        $data->iban_number = $request->iban_number;
        $data->swift_code = $request->swift_code;
        $data->save();
        
            Session::flash('flash_type','success');
            Session::flash('flash_message','Bank Updated Successfully!');
            return redirect('/home/bank/category');
      }
    /*bank category end*/
    
    
    /*servie category start*/
       public function service_category(){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
        $bank = AdminBank::get();
        $currency = Currency::get();
        $user =  User::where('type','!=',0)->get();
        $data = Donation::where('type' ,'transfer')->get();
        return view('service.view')
        ->with('bank',$bank)->with('user',$user)->with('currency',$currency)->with('data',$data);
       }
       
       
       public function service_category_store(Request $request){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }  
        $data = new Donation();
        $data->bank = $request->bank;
        $data->amount = -$request->amount;
        $data->remark = $request->remark;
        $data->currency = $request->currency;
        $data->type = "transfer";
        $data->donation_type = "transfer";
        $data->user_id = $request->user_id;
        $data->save();
        
            Session::flash('flash_type','success');
            Session::flash('flash_message','Service Cateory Created Successfully!');
            return back(); 
       }
       
       public function service_category_delete($id){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        }  
        Donation::destroy($id);
        Session::flash('flash_type','danger');
            Session::flash('flash_message','Service Cateory Deleted Successfully!');
            return back(); 
       }
       
       
    /*service category end*/
    
    
    
    /*Voucher Category start*/
       public function voucher(){
         if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
         $user =  User::where('type','!=',0)->get();
         $paymentcategory = PaymentCategory::get();
         $currency = Currency::get();
         $bank = AdminBank::get();
         $voucher="voucher";
         $title="Voucher";
        $data =  Voucher::where('category','Voucher')->get();
        return view('voucher.voucher')->with('user',$user)->with('paymentcategory',$paymentcategory)
        ->with('currency',$currency)->with('bank',$bank)->with('voucher',$voucher)->with('title',$title)
        ->with('data',$data);
       }
       
       public function create_receipt(){
           $user =  User::where('type','!=',0)->get();
         $paymentcategory = PaymentCategory::get();
         $currency = Currency::get();
         $bank = AdminBank::get();
           return view("voucher.receiptcreate")->with('user',$user)->with('paymentcategory',$paymentcategory)
        ->with('currency',$currency)->with('bank',$bank);
       }
       
       public function create_voucher(){
            $user =  User::where('type','!=',0)->get();
         $paymentcategory = PaymentCategory::get();
         $currency = Currency::get();
         $bank = AdminBank::get();
           return view("voucher.vouchercreate")->with('user',$user)->with('paymentcategory',$paymentcategory)
        ->with('currency',$currency)->with('bank',$bank);
       }
       
       
       public function receipt(){
           if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
        } 
         $user =  User::where('type','!=',0)->get();
         $paymentcategory = PaymentCategory::get();
         $currency = Currency::get();
         $bank = AdminBank::get();
         $voucher="voucher";
         $title="Voucher";
        $data =  Voucher::where('category','Receipt')->get();
        return view('voucher.receipt')->with('user',$user)->with('paymentcategory',$paymentcategory)
        ->with('currency',$currency)->with('bank',$bank)->with('voucher',$voucher)->with('title',$title)
        ->with('data',$data);
       }
       
       public function voucher_store(Request $request){
           if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
           } 
        $data = new Voucher();
        $data->date = $request->date;
        $data->beneficery = $request->beneficery;
        $data->payment_category = $request->payment_category;
        $data->currency = $request->currency;
        $data->category = $request->category;
        $data->bank = $request->bank;
        $data->amount = $request->amount;
        $data->type = $request->type;
        $data->remarks = $request->remarks;
        $data->save();
        Session::flash('flash_type','success');
            Session::flash('flash_message','Created Successfully!');
            return back(); 
        
       }
       
       public function voucher_show($id){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
           } 
           $data =  Voucher::where('id',$id)->first();
           //dd($data);
           $user = User::find($data->beneficery);
          $currency =  Currency::find($data->currency);
           
           return view('voucher.show')->with('data',$data)->with('user',$user)->with('currency',$currency);
       }
       
       public function receipt_show($id){
           if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
           } 
           $data =  Voucher::where('id',$id)->first();
           //dd($data);
           $user = User::find($data->beneficery);
          $currency =  Currency::find($data->currency);
           
           return view('voucher.receiptshow')->with('data',$data)->with('user',$user)->with('currency',$currency);
       }
       
       
       public function voucher_edit($id){
          if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
           }  
           $user =  User::where('type','!=',0)->get();
         $paymentcategory = PaymentCategory::get();
         $currency = Currency::get();
         $bank = AdminBank::get();
         $voucher="voucher";
         $title="Voucher";
         $mode = [
             'Cash','Bank'
             ];
             $category = [
             'Voucher','Receipt'
             ];
        $data =  Voucher::find($id);
        return view('voucher.edit')->with('user',$user)->with('paymentcategory',$paymentcategory)
        ->with('currency',$currency)->with('bank',$bank)->with('voucher',$voucher)->with('title',$title)
        ->with('data',$data)->with('mode',$mode)->with('category',$category);
       }
       
       public function voucher_update(Request $request){
           if(!Auth::user()){
           Session::flash('flash_type','danger');
            Session::flash('flash_message','You are not Authenticate!');
            return back();  
           } 
        $data = Voucher::find($request->id);
        $data->date = $request->date;
        $data->beneficery = $request->beneficery;
        $data->payment_category = $request->payment_category;
        $data->currency = $request->currency;
        $data->bank = $request->bank;
        $data->category = $request->category;
        $data->amount = $request->amount;
        $data->type = $request->type;
        $data->remarks = $request->remarks;
        $data->save();
        Session::flash('flash_type','success');
            Session::flash('flash_message','Voucher Updated Successfully!');
            return redirect('/home/voucher'); 
        
       }
       
    /*Voucher category End*/
    
}
