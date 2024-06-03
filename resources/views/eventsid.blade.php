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




.event-container {
    max-width: 100%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.event-header {
    text-align: center;
}

.event-header h1 {
    font-size: 2em;
    margin-bottom: 10px;
}

.event-header p {
    font-size: 1em;
    margin: 5px 0;
}

.event-description {
    margin: 20px 0;
}

.event-description h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.event-description p {
    font-size: 1em;
    line-height: 1.5;
}

.event-actions {
    text-align: center;
    margin: 20px 0;
}

.event-actions a {
    display: inline-block;
    padding: 10px 20px;
    font-size: 1em;
    background-color: #fbd45a;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    width: 100%;
    text-align: center; /* Ensure text is centered within the button */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition */
}

.event-actions a:hover {
    background-color: #052e16;
    color: #fbd45a; /* Optional: Change text color on hover */
}
/* .event-actions a{
    color:#052e16;
}

.event-actions a:hover{
    color:#fbd45a;
} */

.event-map {
    margin: 20px 0;
}

.event-map h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
    text-align: center;
}

#map-container {
    text-align: center;
}

#location-map {
    width: 100%;
    height: 400px;
    border: 0;
}

/* Responsive Design */
@media (max-width: 600px) {
    .event-container {
        padding: 10px;
    }

    .event-header h1 {
        font-size: 1.5em;
    }

    .event-description h2,
    .event-map h2 {
        font-size: 1.25em;
    }

    .event-actions button {
        padding: 8px 16px;
        font-size: 0.9em;
    }
}

.join-btn{
    display: flex;
    justify-content: center;
}

 </style>
@endsection



@section('content')

<section>
<div class="container">
<!--             
            <div class="container">
                <div class="page-header__inner">
                     <h2>{{$data->event_name}}</h2>
                    <p><b>Date : </b> {{$data->date}}</p>
                    <p><b>Place : </b> {{$data->location_event}}</p>
                   
                </div>
            </div> -->
            
            <div class="event-container">
        <div class="event-header">
            <h1 id="event-name">{{$data->event_name}}</h1>
            <p id="event-date"><b>Date:</b> {{$data->date}}</p>
            <p id="event-location"><b>Location:</b> {{$data->location_event}}</p>
        </div>
        <div class="event-description">
            <h2>About the Event</h2>
            <p id="event-description">{{$data->about_event}}</p>
        </div>
        <div class="join-btn">
            <div class="event-actions">
                <a id="join-event" href="/join-event/{{$data->id}}">Join Event</button>
            </div>
        </div>
        <div class="event-map">
            <h2>Location Map</h2>
            <div id="map-container">
                <!-- Embed Google Map here -->
                <iframe id="location-map"
                        src="{{$data->iframe}}"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
</section>




@endsection