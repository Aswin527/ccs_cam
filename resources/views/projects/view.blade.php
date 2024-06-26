@extends('layouts.admin')
@section('title','Project | Home')
@section('content')

                        
                        
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Projects</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Project Name</th>
                                                <th>Project Category</th>
                                                <th>Project Location</th>
                                                <th>Project About</th>
                                                <th>Project Image</th>
                                                <th>Project Gallery</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($project as $projects)
                                                
                                                    <tr id="{{$projects->id}}" sub_images="{{$projects->project_sub_images}}">
                                                        <td>{{$x}}</td>
                                                        <td>{{$projects->project_name}}</td>
                                                        <td>{{$projects->project_category}}</td>
                                                        <td>{{$projects->project_location}}</td>
                                                        <td>{{$projects->about_project}}</td>
                                                        <td><a href="/images/{{$projects->project_image
                                                        }}" target="" class="btn btn-success">View</a></td>
                                                        </td>
                                                        <td>
                                                       
                                                            <button id="openModalBtn" class="btn btn-primary w-md" onclick="ShowGallery({{$projects->id}})">View Gallery</button>
                                                       
                                                        </td>
                                                       
                                                        <td><a href="/home/projects/delete/{{$projects->id}}" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>

                                                       
                                                    </tr>
                                                    <?php $x++; ?>
                                            @endforeach
                                           
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myModalLabel">Project Gallery</h5>
                                                                    <button id="close_icon" type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div id="img_div"></div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button id="close_modal" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </tbody>

                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                     </div>
                    

@endsection

@section('js')
<script>
    function ShowGallery(id) {
        // console.log($("#"+id).attr('sub_images'));
        var img_string = $("#"+id).attr('sub_images');
        var img_arr =  img_string.split(",");
        var html_content = '';
        for (let i = 0; i < img_arr.length; i++) {
            html_content += `<img src='/images/${img_arr[i]}' width='200px'>`;
        }
        console.log(html_content);
        $("#img_div").empty();
        $("#img_div").append(html_content);
        $('#myModal').modal('show'); // Show the modal
        // event.preventDefault();
    }

document.getElementById("close_modal").addEventListener("click", function(){
    $('#myModal').modal('hide');
});
document.getElementById("close_icon").addEventListener("click", function(){
    $('#myModal').modal('hide');
})
</script>
@endsection