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
                                        <h4 class="card-title">Add Education Qualification</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/education/qualification/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Eduaction Qualification</label>
                                                                    <input type="text" class="form-control" name="education" id="formrow-email-input">
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
                                        <h4 class="card-title">All Events</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Education</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($data as $data)
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$data->education}}</td>
                                                       
                                                     
                                                        <td><a href="/home/education/qualification/{{$data->id}}" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>
                                                       
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