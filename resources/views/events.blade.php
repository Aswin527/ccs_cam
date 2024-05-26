@extends('layouts.app')
@section('meta_title','Events')
@section('content')
<style>
    .container-aboutus {
    height:200px;
}
</style>
<section class="">
            <div class="container-aboutus">
            <div class="overlay"></div>
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Cambodian Chemical Society</a></li>
                        <li><span>></span></li>
                        <li class="active">All Events</li>
                    </ul>
                    <h2>All Events</h2>
                </div>
            </div>
</section>

<section class="w3l-index5" id="news">
  <section id="grids5-block" class="py-5">
    <div class="container py-lg-3">
      
      <div class="grid-view">
        <div class="row">
        @foreach($data as $data)
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="grids5-info">
              <a href="/events/{{$data->id}}" class="d-block zoom">
                @if($data->image_event)
                <img src="/images/{{$data->image_event}}" alt="">
                @else
                <img src="assets/images/resources/donations-list-img-1.jpg" alt="">
                @endif


                <p class="date">{{$data->date}}</p>
              </a>
              <div class="blog-info">
                <label class="tag-label red">Business</label>
                <h4><a href="/events/{{$data->id}}">{{$data->event_name}}</a></h4>
                <p class="blog-text">{{Str::limit($data->about_event, 100)}}</p>
                <a href="/events/{{$data->id}}" class="btn btn-news">Know More <span class="fa fa-arrow-right" aria-hidden="true"></span> </a>
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