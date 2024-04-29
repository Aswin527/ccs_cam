@extends('layouts.admin')
@section('title','Event | Home')
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
                                        <h4 class="card-title">Admin Bank Edit</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/bank/category/update" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Bank Name</label>
                                                                    <input type="text" class="form-control" name="bank_name" id="formrow-email-input" value="{{@$data->bank_name}}">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Bank Holder Name</label>
                                                                    <input type="text" class="form-control" name="holder_name" id="formrow-email-input" value="{{@$data->holder_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Account Number</label>
                                                                    <input type="text" class="form-control" name="account_number" id="formrow-email-input" value="{{@$data->account_number}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">IFSC Code</label>
                                                                    <input type="text" class="form-control" name="ifsc_code" id="formrow-email-input" value="{{@$data->ifsc_code}}">
                                                                </div>
                                                            </div>
                                                              <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">IBAN Number</label>
                                                                    <input type="text" class="form-control" name="iban_number" id="formrow-email-input" value="{{@$data->iban_number}}">
                                                                </div>
                                                            </div>
                                                              <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Swift Code</label>
                                                                    <input type="text" class="form-control" name="swift_code" id="formrow-email-input" value="{{@$data->swift_code}}">
                                                                    <input type="hidden" class="form-control" name="id" id="formrow-email-input" value="{{@$data->id}}">
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