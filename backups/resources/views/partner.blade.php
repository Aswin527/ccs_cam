@extends('layouts.app')
@section('meta_title','')


@section('content')
<style>
    .team-one__single {
    border: 1px solid lightgray;
    padding: 23px;
    text-align: center;
        min-height: 274px;
}
.team-one__img img {
    width: 105px;
    margin: auto;
    text-align: center;
}
.team-one__content {
     position: inherit; 
     display: block; 
     background-color: transparent; 
     text-align: center; 
     margin-left: 20px; 
     margin-right: 20px; 
     border-bottom-left-radius: var(--oxpins-bdr-radius); 
     border-bottom-right-radius: var(--oxpins-bdr-radius); 
     padding: 27px 0 28px; 
}
.team-one__name a {
    color: #000;
    -webkit-transition: all 500ms ease;
    font-size: 14px;
    line-height: 19px;
}
</style>

<section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/bg.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Partners</li>
                    </ul>
                    <h2>Our Partners</h2>
                </div>
            </div>
</section>

<!--Team One Start-->
        <section class="team-one">
            <div class="container">
                <div class="row">
                    
                    <!--Team One Single Start-->
                    @foreach($partner as $partner)
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="team-one__single">
                                <div class="team-one__img">
                                    <img src="/images/{{$partner->image}}" alt="">
                                   
                                </div>
                                <div class="team-one__content">
                                    <h3 class="team-one__name"><a href="#">{{$partner->name}}</a></h3>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--Team One Single End-->
                   
                    
                    
                    
                    
                   
                   
                </div>
            </div>
        </section>
        <!--Team One End-->




@endsection