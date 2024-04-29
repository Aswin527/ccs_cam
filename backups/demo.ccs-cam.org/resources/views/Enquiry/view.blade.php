@extends('layouts.header')
@section('title','View Enquiries')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-eye"></i>
                    View Enquiries
                </div>
                <div class="card-body">
                    @if(count($enquiries)>0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>GST</th>
                                        <th>Drug License</th>
                                        <th>Locations</th>
                                        <th>Message</th>
                                        <th>Enquiry</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enquiries as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->mobile}}</td>
                                            <td>
                                                @if($item->gst)
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->drug)
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td>{{$item->location}}</td>
                                            <td>{{$item->message}}</td>
                                            <td>{{$item->about}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$enquiries->links()}}
                    @else
                        <h6>No Enquiries Found.</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection