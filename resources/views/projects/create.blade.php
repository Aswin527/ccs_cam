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
                                <label class="form-label" for="project_sub_image_1">Add Project Sub Images</label>
                                <button type="" class="btn btn-primary" id="sub_image" img_id="2">+</button>
                                <input type="file" class="form-control mt-3" name="project_sub_image_1" id="project_sub_image_1">
                                
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

document.getElementById("sub_image").addEventListener("click", function() {

    console.log('111');
    var img_id= parseInt($("#sub_image").attr('img_id'));
    $("#prj_sub_imgs").append(`
                                <input type="file" class="form-control mt-3" name="project_sub_image_${img_id}" id="project_sub_image_${img_id}">`);
    event.preventDefault();
    img_id = img_id+1;
    $("#prj_sub_imgs #sub_image").attr('img_id',img_id);
});

    </script>
@endsection('js')
