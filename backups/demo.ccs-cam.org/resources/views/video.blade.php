@extends('layouts.app')
@section('meta_title','Videos')
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
</style>
<section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/you.jpg);background-position: center;">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">All Video</li>
                    </ul>
                    <h2>All Video</h2>
                </div>
            </div>
</section>


<section>
    <div class="container">
        <div class="row">
            
             @foreach($data as $datas)
                <div class="col-lg-4">
                    <div class="videos">
                       {{$datas->iframe}}
                        <h4>{{$datas->title}}</h4>
                    </div>
                </div> 
            @endforeach     
        </div>
    </div>
</section>



@endsection