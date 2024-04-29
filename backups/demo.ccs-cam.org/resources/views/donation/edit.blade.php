@extends('layouts.admin')
@section('meta_title','')
@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                     @if ( Session::has('flash_message') )
                                        <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                                            <b>{{ Session::get('flash_message') }}</b>
                                          
                                        </div>
                                    @endif
                                     @if (count($errors) > 0)
                                        <div class = "alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-header">
                                        <h4 class="card-title">Update Receipt</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/user/donation/update" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Pay Type</label>
                                                                    <select class="form-control" name="donation_type" id="formrow-email-input" onchange="showDivs(this)">
                                                                        <option>Select Option</option>
                                                                        @foreach($category as $category)
                                                                         @if($category->id == $data->donation_type)
                                                                           <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                                                          @else
                                                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                                                          @endif
                                                                        @endforeach
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div id="hidden_div">
                                                                    <label class="form-label" for="formrow-email-input">Remark</label>
                                                                    <input type="text" class="form-control" name="remark" id="formrow-email-input" value="{{$data->remark}}">
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                             <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Amount</label>
                                                                    <input type="number" class="form-control" name="amount" id="formrow-email-input" value="{{$data->amount}}">
                                                                </div>
                                                            </div>
                                                            
                                                             
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Currency</label>
                                                                    <select class="form-control" name="currency" id="formrow-email-input" onchange="showDiv(this)">
                                                                        <option>Select Curency</option>
                                                                        @foreach($currency as $currency)
                                                                          @if($currency->id == $data->currency)
                                                                            <option value="{{$currency->id}}" selected>{{$currency->name}}</option>
                                                                            @else
                                                                             <option value="{{$currency->id}}">{{$currency->name}}</option>
                                                                            @endif
                                                                          @endforeach  
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Being</label>
                                                                    <input type="text" class="form-control" name="being" id="formrow-email-input" value="{{$data->being}}">
                                                                    <input type="hidden" class="form-control" name="id" id="formrow-email-input" value="{{$data->id}}">
                                                                </div>
                                                            </div>
                                                            
                                                           
                                                        </div>
                                                        
                                                        
            
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-primary w-md">Update Receipt</button>
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
   if(select.value==1){
    document.getElementById('qr').innerHTML = "<img src='https://demo.ccs-cam.org/images/usd.jpeg' width='200px'>";
   }
   if(select.value==2){
    document.getElementById('qr').innerHTML = "<img src='https://demo.ccs-cam.org/images/khemer.jpeg' width='200px'>";
   } 
   
} 
function showDivs(select){
   if(select.value==4){
   document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
   } 
</script>
@endsection