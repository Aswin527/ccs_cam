@extends('layouts.admin')
@section('title','Partner | Home')
@section('content')


<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Organization</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Organization Name</th>
                                                <th>Member Name</th>
                                                <th>Organization Email</th>
                                                <th>Organization Phone</th>
                                                <th>Country</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($data as $data)
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$data->organization_name}}</td>
                                                        <td>{{$data->user_id}}</td>
                                                        <td>{{$data->organization_email}}</td>
                                                        <td>{{$data->organizaton_phone}}</td>
                                                        <td>{{$data->country}}</td> 
                                                        <td><a href="/home/organization/delete/{{$data->id}}" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>
                                                        <a href="/home/organization/edit/{{$data->id}}" class="btn btn-warning waves-effect btn-label waves-light"><i class="bx bx-edit-alt label-icon"></i> Edit</a>
                                                         <a href="/home/our/organization/view/{{$data->id}}" class="btn btn-info waves-effect btn-label waves-light"><i class="bx bx-smile label-icon"></i> View</a>
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