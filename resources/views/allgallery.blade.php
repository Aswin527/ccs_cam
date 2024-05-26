@extends('layouts.app')
@section('meta_title','Gallery')
@section('content')
<style>
    .videos{
        margin:30px 0px;
    }

    .images{
        margin:30px 0px;
        display:flex;
        justify-content:center;
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
                        <li class="active">Gallery</li>
                    </ul>
                    <h2>Gallery</h2>
                </div>
            </div>
</section>


<section>
    <div class="owner row" style="margin-top:0px;">
        <h2 class="owner-text">Videos</h2>
        @foreach($video as $key => $videos)
            <div class="col-lg-4 video-container" style="{{ $key >= 3 ? 'display:none;' : '' }}">
                <div class="videos">
                    <iframe width="420" height="315" src="{{ $videos->iframe }}"></iframe>
                    <h4>{{ $videos->title }}</h4>
                </div>
            </div>
        @endforeach

        @if(count($video) > 3)
            <div class="become-volunteer-one__btn-box">
                <button id="show-more-videos" class="thm-btn become-volunteer-one__btn">Show more videos</button>
                <button id="show-less-videos" class="thm-btn become-volunteer-one__btn" style="display:none;">Show less videos</button>
            </div>
        @endif
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const showMoreButton = document.getElementById('show-more-videos');
        const showLessButton = document.getElementById('show-less-videos');
        const hiddenVideos = document.querySelectorAll('.video-container[style*="display:none"]');

        showMoreButton.addEventListener('click', function() {
            hiddenVideos.forEach(function(video) {
                video.style.display = 'block';
            });
            showMoreButton.style.display = 'none';
            showLessButton.style.display = 'block';
        });

        showLessButton.addEventListener('click', function() {
            hiddenVideos.forEach(function(video) {
                video.style.display = 'none';
            });
            showLessButton.style.display = 'none';
            showMoreButton.style.display = 'block';
        });
    });

    </script>


<div class="">
    <div class="owner row">
        <h2 class="owner-text">Images</h2>
        @foreach($gallery as $key => $gallerys)
            <div class="col-lg-4 image-container {{ $key >= 6 ? 'hidden' : '' }}">
                <div class="images">
                    <img src="/images/{{ $gallerys->image }}" alt="Gallery Image {{ $key + 1 }}">
                    <a href="/images/{{ $gallerys->image }}" class="img-popup"></a>
                </div>
            </div>
        @endforeach

        @if(count($gallery) > 6)
            <div class="become-volunteer-one__btn-box">
                <button id="show-more-images" class="thm-btn become-volunteer-one__btn" aria-expanded="false">Show more images</button>
                <button id="show-less-images" class="thm-btn become-volunteer-one__btn hidden" aria-expanded="true">Show less images</button>
            </div>
        @endif
    </div>
</div>

<style>
    .hidden {
        display: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showMoreBtn = document.getElementById('show-more-images');
        const showLessBtn = document.getElementById('show-less-images');
        const hiddenImages = document.querySelectorAll('.image-container.hidden');

        showMoreBtn.addEventListener('click', function() {
            hiddenImages.forEach(image => image.classList.remove('hidden'));
            showMoreBtn.classList.add('hidden');
            showLessBtn.classList.remove('hidden');
            showMoreBtn.setAttribute('aria-expanded', 'true');
            showLessBtn.setAttribute('aria-expanded', 'false');
        });

        showLessBtn.addEventListener('click', function() {
            hiddenImages.forEach(image => image.classList.add('hidden'));
            showMoreBtn.classList.remove('hidden');
            showLessBtn.classList.add('hidden');
            showMoreBtn.setAttribute('aria-expanded', 'false');
            showLessBtn.setAttribute('aria-expanded', 'true');
        });
    });
</script>

</section>






@endsection