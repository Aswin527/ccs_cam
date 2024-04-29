@extends('layouts.app')
@section('meta_title','')


@section('content')
<?php $setting = DB::table('settings')->where('id',1)->first();?>
<section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/bg_about-us.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Pages</li>
                    </ul>
                    <h2>President Message</h2>
                </div>
            </div>
</section>
<section class="owner">
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