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
                        <li class="active">All Video</li>
                    </ul>
                    <h2>All Video</h2>
                </div>
            </div>
</section>


<section>
    <div class="">
       
        <div class="owner row">
        <h2 class="owner-text">Videos</h2>
            @foreach($data as $datas)
           
                <div class="col-lg-4 ">
                    <div class="videos">
                    <iframe width="420" height="315" src="{{$datas->iframe}}"></iframe>
                        <h4>{{$datas->title}}</h4>
                    </div>
                </div> 
            @endforeach 

            
                
        </div>
    </div>

    </section>






@endsection