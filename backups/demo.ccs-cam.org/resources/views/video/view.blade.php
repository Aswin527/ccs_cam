@extends('layouts.admin')
@section('title','Video| Home')
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
                                        <h4 class="card-title">Only Copy the youtube IFRAME SRC <b style="color:red;">"https://www.youtube.com/embed/ab7ecSpAKMU"</b></h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/video/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">   
                                                         <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Title</label>
                                                                    <input type="text" class="form-control" name="title" id="formrow-email-input" placeholder="Title">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Iframe(youtube Video)</label>
                                                                    <input type="text" class="form-control" name="iframe" id="formrow-email-input" placeholder="Embed Youtube Code">
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
                                        <h4 class="card-title">All Iframe</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Title</th>
                                                <th>iframe</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($video as $video)
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                         <td>{{$video->title}}</td>
                                                        <td>{{$video->iframe}}</td>
                                                     
                                                        <td><a href="/home/video/delete/{{$video->id}}" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>
                                                      
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