@extends('layouts.admin')
@section('title','Receipt | Home')
@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                     @if ( Session::has('flash_message') )
                        <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                            <b>{{ Session::get('flash_message') }}</b>
                          
                        </div>
                    @endif
                                    <div class="card-header">
                                        <h4 class="card-title">Create Receipt</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/voucher/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row"> 
                                                         <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Payment Category</label>
                                                                    <input type="text" name="category" class="form-control" id="formrow-email-input" value="Receipt" readonly>
                                                                     
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Beneficery</label>
                                                                   
                                                                     <select class="form-control" name="beneficery" id="formrow-email-input">
                                                                         <option>Select Beneficery</option>
                                                                         @foreach($user as $user)
                                                                          <option value="{{$user->id}}">{{$user->firstname}} / {{$user->lastname}}</option>
                                                                         @endforeach
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Payment Mode</label>
                                                                   
                                                                     <select class="form-control" name="payment_category" id="formrow-email-input" onchange="showDiv(this)">
                                                                         <option>Select Mode</option>
                                                                         <option>Cash</option>
                                                                         <option>Bank</option>
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12" id="hidden_div" style="display:none">
                                                                <div class="mb-3" >
                                                                    <label class="form-label" for="formrow-email-input">Bank</label>
                                                                   
                                                                     <select class="form-control" name="bank" id="formrow-email-input">
                                                                         <option>Select bank</option>
                                                                         @foreach($bank as $bank)
                                                                          <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                                                         @endforeach
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Currency</label>
                                                                   
                                                                     <select class="form-control" name="currency" id="formrow-email-input">
                                                                         <option>Select currency</option>
                                                                         @foreach($currency as $currency)
                                                                          <option value="{{$currency->id}}">{{$currency->name}}</option>
                                                                         @endforeach
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Amount</label>
                                                                    <input type="text" name="amount" class="form-control" id="formrow-email-input">
                                                                    <input type="hidden" name="type" value="Receipt"class="form-control" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Remarks</label>
                                                                    <input type="text" name="remarks" class="form-control" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Date</label>
                                                                    <input type="date" name="date" class="form-control" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
            
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                        </div>
                                                    </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        
                        

                   

@endsection

@section('js')
  <script>
 
function showDiv(select){
   if(select.value== "Bank"){
   document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
   } 
</script>
@endsection