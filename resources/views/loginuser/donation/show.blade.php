@extends('layouts.admin')
@section('title','Donation Request | Home')
@section('content')

                        
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
                                                @foreach($data as $data)
                                                
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$data->name}}</td>
                                                        <td>{{$data->gender}}</td>
                                                        <td>{{$data->mobile}}</td>
                                                        <td>{{$data->email}}</td>
                                                        <td>{{$data->country}}</td>
                                                        <td>{{$data->state}}</td>
                                                        <td>{{$data->organization}}</td>
                                                         <td>{{$data->designation}}</td>
                                                         <td>{!!nl2br(e($data->remarks))!!}</td>                                                        
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
