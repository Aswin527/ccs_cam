@extends('layouts.admin')
@section('title','Partner | Home')
@section('content')

<div class="row">
     <div class="col-xl-3 col-lg-4">
                                <div class="card ">
                                    <div class="card-body dd">
                                        <div class="information">
                                              <div class="logos">
                                                  
                                               <h4>{{$data->organization_name}}</h4>
                                              </div>
                                              <p><b>Organization Category : </b>{{$data->organizaion_category}}</p>
                                               <p><b>Organization Email : </b>{{$data->organization_email}}</p>
                                                <p><b>Organization Phone Number : </b>{{$data->organizaton_phone}}</p>
                                               <p><b>Website : </b>{{$data->website}}</p>
                                               <p><b>Authorized Person : </b>{{$data->authorize_person}}</p>
                                               <p><b>Authorized Email : </b>{{$data->authorize_email}}</p>
                                               <p><b>Organization Registration Number : </b>{{$data->organization_regidtartioin_number}}</p>
                                               <p><b>Organization Registration Certificate : </b><a href="/images/{{$data->organization_registration_certificate}}" target="_blank">View</a></p>
                                               
                                        </div>
                                       
                                        
                                        
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                               
                            </div>
                            <div class="col-xl-9 col-lg-8">
                               
                                        <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All User</h4>
                                    </div>
                                    <div class="card-body">
                                         
                                            
                                            
                                         <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th>Email</th>
                                                <!--<th>Phone</th>-->
                                                <!--<th>National ID</th>-->
                                                <!--<th>National ID Photo</th>-->
                                                
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($user as $partner)
                                                  <?php $amount = DB::table('donations')->where(['user_id'=>$partner->id,'donation_type'=>7])->first();?>
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$partner->firstname}}{{$partner->lastname}}</td>
                                                        <td>@if($amount)
                                                           <a class="btn btn-success waves-effect waves-light">Active</a>
                                                           @else
                                                           <a  class="btn btn-danger waves-effect waves-light">Inactive</a>
                                                           @endif
                                                        </td>
                                                        <td><img src="/images/{{$partner->photo}}" width="50px"></td>
                                                        <td>{{$partner->email}}</td> 
                                                        <!--<td>{{$partner->mobile}}</td>-->
                                                        <!--<td>{{$partner->national_id}}</td>-->
                                                        <!--<td><img src="/images/{{$partner->national_photo}}" width="50px"></td>-->
                                                       
                                                        <td><a href="/home/our/user/delete/{{$partner->id}}" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>
                                                        <a href="/home/our/user/edit/{{$partner->id}}" class="btn btn-warning waves-effect btn-label waves-light"><i class=" bx bx-edit-alt label-icon"></i> Edit</a>
                                                        <a href="/home/our/user/view/{{$partner->id}}" class="btn btn-info waves-effect btn-label waves-light"><i class="bx bx-smile label-icon"></i> View</a>
                                                        </td>
                                                       <td>@if($partner->status == 0)
                                                          <a href="/home/user/status/{{$partner->id}}/1" class="btn btn-outline-info waves-effect waves-light">Pending</a>
                                                          @else
                                                          <a href="/home/user/status/{{$partner->id}}/0" class="btn btn-outline-success waves-effect waves-light">Approved</a>
                                                          @endif
                                                         </td>
                                                    </tr>
                                                    <?php $x++; ?>
                                            @endforeach
                                           
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                           
                            <!-- end col -->
                        </div>
                        
  @endsection                      