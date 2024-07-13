@extends('layouts.app')
@section('meta_title','Projects')
@section('content')
<style>
.container-aboutus {
    height: 200px;
}
.contact-three .container {
    max-width: 1200px;
}
.contact-three {
    padding: 0px;
}
.grids5-info img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
</style>
<div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>
<section class="about-section">
    <div class="container-aboutus">
        <div class="overlay"></div>
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="/">Cambodian Chemical Society</a></li>
                <li><span>></span></li>
                <li class="active">All Projects</li>
            </ul>
            <h2>All Projects</h2>
        </div>
    </div>
</section>

<section class="contact-three w3l-index5" id="news">
    <section id="grids5-block" class="py-5">
        <div class="container py-lg-3">
            <div class="grid-view">
                <div class="row">
                    @foreach($data as $project)
                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="grids5-info">
                            <a href="/projectid/{{$project->id}}" class="d-block zoom">
                                @if($project->project_image)
                                <img src="/images/{{$project->project_image}}" alt="{{$project->project_name}}">
                                @else
                                <img src="assets/images/resources/project_image.png" alt="Default Project Image">
                                @endif
                                <p class="date">{{$project->date}}</p>
                            </a>
                            <div class="blog-info">
                                <label class="tag-label red">{{$project->project_category}}</label>
                                <h4><a href="/projectid/{{$project->id}}">{{$project->project_name}}</a></h4>
                                <p class="blog-text">{{ Str::limit($project->about_project, 100) }}</p>
                                <a href="/projectid/{{$project->id}}" class="btn btn-news">Know More <span class="fa fa-arrow-right" aria-hidden="true"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</section>

@endsection
