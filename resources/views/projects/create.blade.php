@extends('layouts.admin')
@section('title', 'Project | Home')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Flash Message -->
            @if (Session::has('flash_message'))
                <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                    <b>{{ Session::get('flash_message') }}</b>
                </div>
            @endif

            <!-- Card Header -->
            <div class="card-header">
                <h4 class="card-title">Project Add</h4>
            </div>

            <!-- Card Body -->
            <div class="card-body p-4">
                <form action="/home/our/projects/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                    <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="project_category">Project Option</label>
                                <select class="form-control" name="project_category" id="project_category">
                                    <option value="Training">Training</option>
                                    <option value="Science campaing">Science campaing</option>
                                </select>
                            </div>
                        </div>
                        <!-- Event Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="project_name">Project Name</label>
                                <input type="text" class="form-control" name="project_name" id="project_name">
                            </div>
                        </div>

                        <!-- Location of Event -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="project_location">Location of Project</label>
                                <input type="text" class="form-control" name="project_location" id="project_location">
                            </div>
                        </div>

                        <!-- Date of Events -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="date">Date of Project</label>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                        </div>

                        <!-- Image of Event -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="project_image">Image of Project</label>
                                <input type="file" class="form-control" name="project_image" id="project_image">
                            </div>
                        </div>

                        <!-- Iframe Location -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="iframe">Iframe Location</label>
                                <textarea class="form-control" name="iframe" id="iframe"></textarea>
                            </div>
                        </div>

                        <!-- About the Event -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="about_project">About the Project</label>
                                <textarea class="form-control" name="about_project" id="about_project"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Image of Event -->
                        <div class="col-md-6">
                            <div class="mb-3" id="prj_sub_imgs">
                                <label class="form-label" for="project_sub_image">Add Project Gallery</label>
                                <!-- <button type="" class="btn btn-primary" id="sub_image" img_id="2">+</button> -->
                                <input type="file" class="form-control mt-3" name="project_sub_image[]" id="project_sub_image" onchange="image_select()" multiple>
                                <input type="hidden" id="removed_images" name="removed_images" value="">
                           

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="d-flex flex-wrap justify-content-center" id="container">

                            </div>
                        </div>
                       
                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    var images = [];
    var removed_images = [];
    function image_select() {
        images = [];
        removed_images = [];
        var image = document.getElementById('project_sub_image').files;
        for(i=0; i < image.length; i++){
            if(check_duplicate(image[i].name)){
                images.push({
                    "name": image[i].name,
                    "url": URL.createObjectURL(image[i]),
                    "file": image[i],
                })
            }
            else {
                alert(image[i].name + " already exists");
            }
        }
       var html_content = image_show();
       console.log(html_content);
      
       $("#container").empty();
       $("#container").append(html_content);
       console.log(document.getElementById('project_sub_image').files);
    }


    function image_show(){
        var image= "";
        images.forEach((i) => {
            image += `<div class="col-md-4 mr-3 mb-3 image-container d-flex justify-content-center position-relative">
                            <img src="`+i.url+`" alt = "image" height="200px" width="200px">
                            <button class="btn btn-xs btn-danger" onclick="delete_image(`+images.indexOf(i)+`)">&times;</button>
                     </div>`;
        })
        return image;
    }

    function delete_image(e){
        removed_images.push(images[e].name);
        $("#removed_images").val(removed_images);
        images.splice(e, 1);
        // console.log(removed_images);
    //  console.log("images ->"+images);
        var html_content = '';
        var html_content = image_show();
        // document.getElementById('project_sub_image').files.splice(e,1);
        
       $("#container").empty();
    
       $("#container").append(html_content);
    }

document.getElementById("sub_image").addEventListener("click", function() {
    $("#project_sub_image").val(null);
    $("#container").empty();
//     console.log('111');
//     var img_id= parseInt($("#sub_image").attr('img_id'));
//     $("#prj_sub_imgs").append(`
//                                 <input type="file" class="form-control mt-3" name="project_sub_image_${img_id}" id="project_sub_image_${img_id}">`);
//     event.preventDefault();
//     img_id = img_id+1;
//     $("#prj_sub_imgs #sub_image").attr('img_id',img_id);
});

function check_duplicate(name){
    var image = true;
    if(images.length > 0) {
        for(e=0; e < images.length; e++){
            if(images[e].name == name) {
                image = false;
                break;
            }
        }
    }
    return image;
}

    </script>
@endsection('js')
