@extends('layouts.app')
@section('meta_title',)
@section('meta_keywords',)
@section('meta_description',)

   
@section('content')



<br><br>

<div class="container cat">
    <div class="row justify-content-center">
        
                
                <div class="col-lg-12 col-md-12">
                    @if(count($products) == 0)
                        <h6>No Products Found.</h6>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Packing</th>
                                        <th>Composition</th>
                                        <th>Visual Aids</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                   
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>
                                            
                                              <!-- Button trigger modal -->
                     <a href="#myModal" data-toggle="modal" data-gallery="example-gallery" class="" data-img-url="{{asset('')}}/{{$item->image}}">
                <i class="fa fa-eye btn btn-primary"><br>View</i>

            </a>

                                            
                                            
                                            
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->packing }}</td>
                                            <td>{{ $item->composition }}</td>
                                            
                                            @foreach($vis as $vi)
                                               @if($vi->name==$item->id)
                                             
                                            <td>
                                                <a href="#myModals" data-toggle="modal" data-gallery="example-gallery" class="" data-img-url="/public/visual/{{$vi->image}}">
                           <i class="fa fa-eye btn btn-primary"><br>View</i>

                   </a>
                                                
                                                
                                                
                                           
                                           @endif
                                            @endforeach
                                            
                                            <td class="dt-bttn"><a href="{{ $item->slug }}">Details</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $products->links() }}
                    @endif
                </div>
            </div>
            
</div>
<!-- Modal Product Image -->
<div id="myModal" class="modal fade cat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img class="" src="#"/>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Gallery Image -->
<div id="myModals" class="modal fade cat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img class="" src="#"/>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal-->
<br><br>
@endsection




