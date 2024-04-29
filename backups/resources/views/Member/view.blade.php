@extends('layouts.admin')
@section('title','Partner | Home')
@section('content')


<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Member</h4>
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
                                                @foreach($partner as $partner)
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
                            </div> <!-- end col -->
</div> <!-- end row -->

@endsection