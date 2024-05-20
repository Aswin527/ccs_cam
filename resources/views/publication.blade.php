@extends('layouts.app')
@section('meta_title','')
@section('content')
<style>
    .container-aboutus {
    height:200px;
}
</style>
<section class="">
            <div class="container-aboutus">
            <div class="overlay"></div>
                <div class="page-header__inner" >
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Cambodian Chemical Society</a></li>
                        <li><span>></span></li>
                        <li class="active">Publications</li>
                    </ul>
                    <h2>Publications</h2>
                </div>
            </div>
</section>


<section class="product">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="product__sidebar">
                           
                            <div class="product__price-ranger product__sidebar-single">
                                <h3 class="product__sidebar-title">Browse By Issue</h3>
                                 <form action="/publication/search" method="get">
                                     @csrf
                                    <label for="sel1" class="form-label">By Journal</label>
                                    <select class="form-select" id="sel1" name="type">
                                        <option>Select Option</option>
                                       @foreach($type as $type)    
                                      <option value="{{$type->type}}">{{$type->type}}</option>
                                     @endforeach
                                    </select>
                                    
                                    <label for="sel1" class="form-label">By Volume</label>
                                    <select class="form-select" id="sel1" name="volume">
                                        <option>Select Option</option>
                                    @foreach($volume as $volume)    
                                      <option value="{{$volume->volume}}">{{$volume->volume}}</option>
                                     @endforeach 
                                    </select>
                                    
                                     <label for="sel1" class="form-label">By Year</label>
                                    <select class="form-select" id="sel1" name="date">
                                        <option>Select Option</option>
                                       @foreach($date as $date)    
                                      <option value="{{$date->date}}">{{$date->date}}</option>
                                     @endforeach
                                    </select>
                                    
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                  </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="product__items">
                            
                            <div class="product__all">
                                <div class="row">
                                    <!--Product All Single Start-->
                                    @foreach($publication as $publication)
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="product__all-single">
                                                <div class="product__all-single-inner">
                                                   <a href="{{$publication->pdf}}" target="_blank"><img src="/{{$publication->image}}" alt=""></a>
                                                    <div class="product__all-content">
                                                        
                                                        <h4 class="product__all-title"><a href="/{{$publication->pdf}}" target="_blank">{{$publication->name}}</a></h4>
                                                        <p class="product__all-price"><b>Volume :</b> {{$publication->volume}}</p>
                                                        <p class="product__all-price"><b>Date :</b> {{$publication->date}}</p>
                                                        
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!--Product All Single End-->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection