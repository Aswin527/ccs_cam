@extends('layouts.admin')
@section('title','View Publication')
@section('content')



<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Publication</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                           <tr>
                                                <th>SR</th>
                                        <th>Name</th>
                                        <th>Volume</th>
                                        <th>Date</th>
                                        <th>Issue</th>
                                        <th>Image</th>
                                       <th>PDF</th>
                                        <th>Actions</th>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td>{{$x}}</td>
                                            <td>{{$item->name}}</td>
                                           <td>{{$item->volume}}</td>
                                           <td>{{$item->date}}</td>
                                            <td>{{$item->issue}}</td>
                                          
                                            <td><img width="40px" src="/{{ $item->image }}"></td>
                                            <td><a href="/{{ $item->pdf }}" target="_blink" class="btn btn-success waves-effect btn-label waves-light"><i class=" bx bxs-file-pdf label-icon"></i> View PDF</a></td>
                                            <td>
                                               
                                                    <a href="/home/categories/edit/{{ $item->id }}"  class="btn btn-warning waves-effect btn-label waves-light"><i class=" bx bx-edit-alt label-icon"></i> Edit</a>
                                                    <a href="/home/categories/delete/{{ $item->id }}" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>
                                               
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