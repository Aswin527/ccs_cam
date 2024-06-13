@extends('layouts.admin')
@section('meta_title','')
@section('content')

                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Payments
                                        
                                        </h4>
                                        <a href="/home/create/receipt" class="btn btn-success">Create Receipt</a>
                                        <a href="/home/create/voucher" class="btn btn-danger">Create Voucher</a>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Member</th>
                                                <th>Pay Type</th>
                                                <th>Currency</th>
                                                <th>Amount</th>
                                                <th>Transaction Photo</th>
                                                <th>Status</th>
                                                <th>Status Change</th>
                                                <td></td>
                                                <!--<th>Action</th>-->
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($data as $data)
                                                   <?php $category = DB::table('payment_catgeory')->where('id',$data->donation_type)->first();
                                                        $user = DB::table('users')->where('id',$data->user_id)->first();
                                                   ?>
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                         <td>@if($user) {{$user->firstname}} @endif</td>
                                                        <td>@if($category){{$category->name}}@endif</td> 
                                                         <td> @if($data->currency ==1 )
                                                          Doller (USD)
                                                           @else
                                                           KHR (៛)
                                                           @endif
                                                         </td>
                                                        <td> {{$data->amount}}</td>
                                                         <td><a href="/images/{{$data->transection}}" class="btn btn-outline-info waves-effect waves-light" target="_blank">view</a></td>
                                                        <td>@if($data->status ==0)
                                                       
                                                         <button type="button" class="btn btn-outline-warning waves-effect waves-light">Pending</button>
                                                        @elseif($data->status ==1)
                                                        
                                                        <button type="button" class="btn btn-outline-success waves-effect waves-light">Approved</button>
                                                        @else
                                                        
                                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light">Reject</button>
                                                        @endif</td>
                                                         <form action="/home/all/payments/status" method="post">
                                                                @csrf
                                                        <td>
                                                           
                                                                <div class="d-flex" style="display:flex;gap:1px">
                                                                    <select class="form-control" name="status">
                                                                        <option>Select Option</option>
                                                                        <option value="1">Approved</option>
                                                                        <option value="2">Reject</option>
                                                                      </select>
                                                                <input type="hidden" value="{{$data->id}}" name="id">
                                                                </div>
                                                                
                                                               
                                                            
                                                        </td><td> <button type="submit" class="btn btn-success">Submit</button></td>
                                                        </form>
                                                        
                                                        <!-- <td>-->
                                                        <!--     @if($data->status ==1)-->
                                                        <!--     <a href="/home/donation/show/{{$data->id}}" target="_blank" class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bx-smile label-icon"></i> Show</a>-->
                                                        <!--    @endif-->
                                                       
                                                        <!--<a href="/home/donation/edit/{{$data->id}}" class="btn btn-warning waves-effect btn-label waves-light"><i class=" bx bx-edit-alt label-icon"></i> Edit</a>  </td>-->
                                                    </tr>
                                                    <?php $x++; ?>
                                            @endforeach
                                           
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                     </div>


                     <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Donation Requests</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Country</th>
                                                <th>Province</th>
                                                <th>Organization</th>
                                                <th>Designation</th>
                                                <th>Comments</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($donation_requests as $donation_request_data)
                                                
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$donation_request_data->name}}</td>
                                                        <td>{{$donation_request_data->gender}}</td>
                                                        <td>{{$donation_request_data->mobile}}</td>
                                                        <td>{{$donation_request_data->email}}</td>
                                                        <td>{{$donation_request_data->country}}</td>
                                                        <td>{{$donation_request_data->state}}</td>
                                                        <td>{{$donation_request_data->organization}}</td>
                                                         <td>{{$donation_request_data->designation}}</td>
                                                         <td>{!!nl2br(e($donation_request_data->remarks))!!}</td>                                                        
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

