@extends('layouts.app')
@section('meta_title','')


@section('content')
<style>
    .team-one__single {
    /* border: 1px solid lightgray; */
    padding: 15px;
    text-align: center;
    min-height: 140px;
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
.container-aboutus {
    height:200px;
}
.team-one {
    background-color: var(--oxpins-extra);
}
</style>

<section class="">
           
            <div class="container-aboutus">
            <div class="overlay"></div>
                <div class="page-header__inner" >
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Cambodian Chemical Society</a></li>
                        <li><span>></span></li>
                        <li class="active">Partners</li>
                    </ul>
                    <h2>Our Partners</h2>
                </div>
            </div>
</section>

<!--Team One Start-->
        <section class="team-one" style="padding-top:25px;">
            <div class="container">
                <div class="row">
                    
                    <!--Team One Single Start-->
                    @foreach($partner as $partner)
                        <div class="col-xl-4 col-lg-7 col-md-7 wow fadeInUp" data-wow-delay="100ms">
                            <div class="team-one__single">
                                <div class="" style="width:105px; margin:auto; text-align: center;">
                                    <img src="/images/{{$partner->image}}" alt="" width="130" height="130">
                                </div>
                                <!-- <div class="team-one__content">
                                    <h3 class="team-one__name"><a href="#">{{$partner->name}}</a></h3>
                                    
                                </div> -->
                            </div>
                        </div>
                    @endforeach

                    <!--Team One Single End-->
                   
                    
                    
                    
                    
                   
                   
                </div>
            </div>
        </section>
        <!--Team One End-->




@endsection