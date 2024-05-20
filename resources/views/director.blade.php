@extends('layouts.app')
@section('meta_title','')


@section('content')
<style>
    .container-aboutus {
    height:200px;
}
</style>
<?php $setting = DB::table('settings')->where('id',1)->first();?>
<section class="">
            
            <div class="container-aboutus">
            <div class="overlay"></div>
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Cambodian Chemical Society</a></li>
                        <li><span>></span></li>
                        <li class="active">About</li>
                        <li><span>></span></li>
                    </ul>
                    <h2>President Message</h2>
                </div>
            </div>
</section>
<section class="owner" style="margin-top:0px;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="owner-text">
                    <div class="owner-images">
                    <img src="/images/{{$setting->president_image}}" width="200px">
                </div>
                   <h4>{{$setting->president_name}}</h4>
                   <h6>Cambodian Chemical Society</h6>
                    <p>{{$setting->president_description}}</p>
                   </div>
            </div>
           
        </div>
    </div>
</section>





@endsection