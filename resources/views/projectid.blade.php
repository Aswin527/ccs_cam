@extends('layouts.app')
@section('meta_title', 'Projects')

@section('css')
<style>

/* Form Styling */
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

/* Input Styling */
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

/* Button Styling */
button {
    padding: 19px 39px 18px 39px;
    color: #FFF;
    background-color: #4bc970;
    font-size: 18px;
    text-align: center;
    border-radius: 5px;
    width: 100%;
    border: 1px solid #3ac162;
    box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
    margin-bottom: 10px;
}

/* Event Container */
.event-container {
    max-width: 100%;
    margin: 20px auto;
    padding: 0;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    position: relative;
}

.event-image {
    position: relative;
    width: 100%;
    height: 300px;
    background-size: cover;
    background-position: center;
}

.event-header {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    text-align: center;
    padding: 20px;
}

.event-description {
    margin: 20px;
}

.event-gallery {
    margin: 20px;
}

.event-gallery h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
    text-align: center;
}

.gallery-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.gallery-item {
    flex: 1 1 calc(33.333% - 20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

.gallery-item img {
    width: 100%;
    height: auto;
    display: block;
}

/* Responsive Design */
@media (max-width: 600px) {
    .event-container {
        padding: 10px;
    }

    .gallery-item {
        flex: 1 1 calc(50% - 10px);
    }
}

@media (max-width: 400px) {
    .gallery-item {
        flex: 1 1 100%;
    }
}
</style>
@endsection

@section('content')
<section>
    <div class="container">
        <div class="event-container">
            <div class="event-image" style="background-image: url('{{ asset('images/' . $data->project_image) }}');">
                <header class="event-header">
                    <h1 id="event-name">{{ $data->project_name }}</h1>
                    <p id="event-date"><b>Date:</b> {{ $data->date }}</p>
                    <p id="event-location"><b>Location:</b> {{ $data->project_location }}</p>
                </header>
            </div>
            <article class="event-description">
                <h2>About the Project</h2>
                <p id="event-description">{{ $data->about_project }}</p>
            </article>
            <section class="event-gallery">
                <h2>Project Gallery</h2>
                <div class="gallery-container">
                    @php
                        $images = explode(',', $data->project_sub_images);
                    @endphp
                    @foreach($images as $image)
                        <div class="gallery-item">
                            <img src="{{ asset('images/' . trim($image)) }}" alt="Gallery Image">
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</section>
@endsection
