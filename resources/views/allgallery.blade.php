@extends('layouts.app')
@section('meta_title','Gallery')
@section('content')
<style>
    .videos{
        margin:30px 0px;
    }
    .videos h4 {
        font-size: 14px;
        font-size: t-w;
        font-weight: bold;
    }

    .video_div {
        position: relative;
        display: block;
        background-color: var(--oxpins-black);
        margin-top:30px;
        margin-bottom:30px;
        padding-top:15px;
        z-index:1
        }
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
                        <li class="active">Gallery</li>
                    </ul>
                    <h2>Gallery</h2>
                </div>
            </div>
</section>


<section>
    <div class="">
       
        <div class="owner row" style="margin-top:0px;">
        <h2 class="owner-text">Videos</h2>
            @foreach($video as $key=>$videos)
            @if($key >= 3)
            @break
            @endif
                <div class="col-lg-4 ">
                    <div class="videos">
                    <iframe width="420" height="315" src="{{$videos->iframe}}"></iframe>
                        <h4>{{$videos->title}}</h4>
                    </div>
                </div> 
            @endforeach 

            @if(count($video) >= 3) 
            <div class="become-volunteer-one__btn-box">
                 <a href="/all-video" class="thm-btn become-volunteer-one__btn">Show more videos</a>
            </div>
            @endif
            
                
        </div>
    </div>

    <div class="">
       
        <div class="owner row">
        <h2 class="owner-text">Images</h2>
        @foreach($gallery as $key=>$gallerys)
            @if($key >= 6)
            @break
            @endif
                <div class="col-lg-4">
                    <div class="videos">
                       <img src="/images/{{$gallerys->image}}" alt="">
                       <a href="/images/{{$gallerys->image}}" class="img-popup"></a>
                    </div>
                </div> 
               
            @endforeach 

            @if(count($gallery) >= 6) 
            <div class="become-volunteer-one__btn-box">
                 <a href="/all-image" class="thm-btn become-volunteer-one__btn">Show more images</a>
            </div>
            @endif
        </div>
    </div>
</section>






@endsection