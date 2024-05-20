@extends('layouts.app')
@section('meta_title','Images')
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
                        <li class="active">All Images</li>
                    </ul>
                    <h2>All Images</h2>
                </div>
            </div>
</section>


<section class="gallery-one">
            
            <div class="gallery-one__bottom">
                <div class="gallery-one__container">
                    <ul class="list-unstyled gallery-one__list">
                    @foreach($data as $datas )    
                        <li class="gallery-one__single wow fadeInUp" data-wow-delay="100ms">
                            <div class="gallery-one__img">
                                <img src="/images/{{$datas->image}}" alt="">
                                <a href="/images/{{$datas->image}}" class="img-popup"></a>
                                
                            </div>
                        </li>
                     @endforeach  
                    </ul>
                </div> 
            </div>
        </section>






@endsection