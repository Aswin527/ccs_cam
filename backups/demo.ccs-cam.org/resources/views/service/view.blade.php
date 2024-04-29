@extends('layouts.admin')
@section('title','Service Category | Home')
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
                                        <h4 class="card-title">Service Category</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/service/category/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Bank</label>

                                                                    <select class="form-control" name="bank" id="formrow-email-input">
                                                                        <option>Select Bank</option>
                                                                        @foreach($bank as $bank) 
                                                                            <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Currency</label>

                                                                    <select class="form-control" name="currency" id="formrow-email-input">
                                                                        <option>Select Bank</option>
                                                                        @foreach($currency as $currency) 
                                                                            <option value="{{$currency->id}}">{{$currency->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Amount</label>
                                                                    <input type="text" class="form-control" name="amount" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Remark</label>
                                                                    <input type="text" class="form-control" name="remark" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Beneficery</label>
                                                                    
                                                                    <select class="form-control" name="user_id" id="formrow-email-input">
                                                                        <option>Select Beneficery</option>
                                                                        @foreach($user as $user) 
                                                                            <option value="{{$user->id}}">{{$user->firstname}}</option>
                                                                        @endforeach
                                                                    </select>
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
                        
                        
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Service</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Beneficiery</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Currency</th>
                                                <th>Bank</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($data as $data)
                                                 <?php $user = DB::table('users')->where('id',$data->user_id)->first();
                                                       $currency = DB::table('currency')->where('id',$data->currency)->first();
                                                       $bank = DB::table('admin_bank')->where('id',$data->bank)->first();
                                                 
                                                 ?>
                                                 
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>@if($user){{@$user->firstname}}@endif</td>
                                                       <td><?php echo abs($data->amount);?></td>
                                                        <td>{{$data->type}}</td>
                                                        <td>@if($currency){{@$currency->name}}@endif</td>
                                                        <td>@if($bank){{@$bank->bank_name}}@endif</td>
                                                        <td><a href="/home/service/delete/{{$data->id}}" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>
                                                       </td>
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