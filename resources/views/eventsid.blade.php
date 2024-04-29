@extends('layouts.app')
@section('meta_title','Events')


@section('css')
 <style>
     form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}
.page-header-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-color: transparent;
    background-blend-mode: luminosity;
    opacity: inherit;
    z-index: -1;
    height: 591px;
}
section.page-header {
    height: 600px;
}
.page-header__inner p {
    color: #fff;
    font-size: 22px;
    font-weight: bold;
}
.lool {
    background: #fcb609;
    margin: 20px;
    padding: 10px;
    text-align: center;
    border-radius: 40px;
}
.lool a {
    color: #fff;
    font-weight: bold;
    font-size: 18px;
}
@media screen and (min-width: 480px) {

  form {
    max-width: 562px;
  }

}
 </style>
@endsection



@section('content')

<section class="page-header">
            <div class="page-header-bg" style="background-image: url(/assets/images/Angkor-Wat-temple-complex-Camb.webp)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                     <h2>{{$data->event_name}}</h2>
                    <p><b>Date : </b> {{$data->date}}</p>
                    <p><b>Place : </b> {{$data->location_event}}</p>
                   
                </div>
            </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="lool">
                    <a href="/event-detail/{{$data->id}}">
                        ABOUT EVENT
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="lool">
                    <a href="/join-event/{{$data->id}}">
                        JOIN EVENT
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="lool">
                    <a href="{{$data->iframe}}" target="_blink">
                        LOCATION MAP
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

 

        
      <!--  <section class="">-->
      <!--      <div class="container">-->
      <!--          <div class="row">-->
      <!--              @if ( Session::has('flash_message') )-->
      <!--                  <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">-->
      <!--                      <b>{{ Session::get('flash_message') }}</b>-->
      <!--                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
      <!--                          <span aria-hidden="true">×</span>-->
      <!--                      </button>-->
      <!--                  </div>-->
      <!--              @endif-->
      <!--              <div class="col-lg-12">-->
      <!--                   <form action="/events/store/memerid" method="post">-->
      <!--                @csrf-->
      
        
      <!--  <fieldset>-->
      <!--    <legend> <span class="number">1</span> Your Basic Info</legend>-->
      <!--    <label for="name">Member ID:</label>-->
      <!--    <input type="text" id="name" name="member_id">-->
      <!--    <input type="hidden" id="event" name="event_id">-->
      <!--</fieldset>-->
      <!--  <fieldset>  -->
        
      <!--    <legend><b>{{$data->event_name}}</b></legend>-->
          
      <!--   <label for="bio">About Event:</label>-->
      <!--    <textarea id="bio" name="user_bio" readonly>-->
      <!--        {{$data->about_event}}-->
      <!--    </textarea>-->
        
       
      
         
          
         
          
      <!--   </fieldset>-->
       
      <!--  <button type="submit">Submit</button>-->
        
      <!-- </form>-->
      <!--              </div>-->
      <!--          </div>-->
      <!--      </div>-->
      <!--  </section>-->


<!-- Modal -->


@endsection