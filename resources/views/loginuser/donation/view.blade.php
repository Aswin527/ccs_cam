@extends('loginuser.layouts')
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
                                        <h4 class="card-title">Pay Now</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/user/donation/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Pay Type</label>
                                                                    <select class="form-control" name="donation_type" id="formrow-email-input" onchange="showDivs(this)">
                                                                        <option>Select Option</option>
                                                                        @foreach($category as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div id="hidden_div" style="display:none">
                                                                    <label class="form-label" for="formrow-email-input">Remark</label>
                                                                    <input type="text" class="form-control" name="remark" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Currency</label>
                                                                    <select class="form-control" name="currency" id="formrow-email-input" onchange="showDiv(this)">
                                                                        <option>Select Curency</option>
                                                                        @foreach($currency as $currency)
                                                                            <option value="{{$currency->id}}">{{$currency->name}}</option>
                                                                            
                                                                          @endforeach  
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            
                                                             <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Amount</label>
                                                                    <input type="number" class="form-control" name="amount" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            
                                                             
                                                            
                                                        </div>
                                                        <div class="row">
                                                            
                                                            <div class="col-md-12">
                                                                 <div id="qr">
                                                                     
                                                                 </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Upload Transection Photo</label>
                                                                    <input type="file" class="form-control" name="transection" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

            
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-primary w-md">Pay Now</button>
                                                        </div>
                                                    </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Pays</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Pay Type</th>
                                                <th>Currency</th>
                                                <th>Amount</th>
                                                <th>Transection Photo</th>
                                                <th>Status</th>
                                                <th>Remark</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($data as $data)
                                                  <?php $type= DB::table('payment_catgeory')->where('id',$data->donation_type)->first();?>
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>@if($type){{$type->name}}@endif</td> 
                                                         <td> @if($data->currency ==1 )
                                                          Doller (USD)
                                                           @else
                                                           KHR (៛)
                                                           @endif
                                                         </td>
                                                        <td>$ {{$data->amount}}</td>
                                                         <td><a href="/images/{{$data->transection}}" class="btn btn-outline-info waves-effect waves-light" target="_blank">view</a></td>
                                                        <td>@if($data->status ==0)
                                                       
                                                         <button type="button" class="btn btn-outline-warning waves-effect waves-light">Pending</button>
                                                        @elseif($data->status ==1)
                                                        
                                                        <button type="button" class="btn btn-outline-success waves-effect waves-light">Approved</button>
                                                        @else
                                                        
                                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light">Reject</button>
                                                        @endif</td>
                                                        <td>{{$data->remark}}</td>
                                                       
                                                    </tr>
                                                    <?php $x++; ?>
                                            @endforeach
                                           
                                            </tbody>
                                        </table>
        
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