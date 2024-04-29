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
                                        <h4 class="card-title">Admin Bank</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/bank/category/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Bank Name</label>
                                                                    <input type="text" class="form-control" name="bank_name" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Bank Holder Name</label>
                                                                    <input type="text" class="form-control" name="holder_name" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Account Number</label>
                                                                    <input type="text" class="form-control" name="account_number" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">IFSC Code</label>
                                                                    <input type="text" class="form-control" name="ifsc_code" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                              <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">IBAN Number</label>
                                                                    <input type="text" class="form-control" name="iban_number" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                              <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Swift Code</label>
                                                                    <input type="text" class="form-control" name="swift_code" id="formrow-email-input">
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
                                        <h4 class="card-title">All Bank</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Bank Name</th>
                                                <th>Holder Name</th>
                                                <th>Account Number</th>
                                                <th>IBAN Number</th>
                                                <th>IFSC Code</th>
                                                 <th>Swift Code</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($data as $data)
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$data->bank_name}}</td>
                                                        <td>{{$data->holder_name}}</td>
                                                        <td>{{$data->account_number}}</td>
                                                        <td>{{$data->iban_number}}</td>
                                                        <td>{{$data->ifsc_code}}</td>
                                                         <td>{{$data->swift_code}}</td>
                                                     
                                                        <td><a href="/home/bank/delete/{{$data->id}}" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>
                                                        <a href="/home/bank/edit/{{$data->id}}" class="btn btn-warning waves-effect btn-label waves-light"><i class=" bx bx-edit-alt label-icon"></i> Edit</a>
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