@extends('layouts.app')
@section('meta_title','Events')
@section('css')
<link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
 
  <style>
    .qr-code {
      max-width: 200px;
      margin: 10px;
    }
  </style>
@endsection
@section('content')

<section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/bg_about-us.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">QRCode</li>
                    </ul>
                    <h2>QRCode</h2>
                </div>
            </div>
</section>

<section class="donations-list">
            <div class="container-fluid">
        <div class="col-12">
                    <div class="barcode my-0">
                        <div class="recharge d-flex flex-column align-items-center justify-content-center" >
                            <div class="qrimg mb-3 border" style='border-radius: 10px;' >
                              <div id="qrcode-container" class='qrcode-container' style='width:150px; height:150px; padding: 8px; background:#F4F4F4;'>
                                <div id="qrcode" class="qrcode border" style='width:100%; height:100%'></div>
                            </div>

                            </div>

                        </div>
                        
                        <div class='p-3 rounded-4' style='background:#F4F4F4'>
                        
                        <div class="recharge_link position-relative d-flex justify-content-between w-100 rounded-4" style='background:white; '>
                            <input class="form-control text-muted" style="border:none;font-size:13px" id="website" name="website"  type="hidden" placeholder=""
                                aria-label="input" value="https://demo.ccs-cam.org/events/{{$id}}">
                               
                        </div> 
                        
                        
                        </div>  
                    </div>
                </div>
  </div>
        </section>




@endsection


@section('js')
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
        <script>
            window.onload = function() {
              generateQRCode();
            };
        </script>
        <script>
            function generateQRCode() {
    let website = document.getElementById("website").value;
    if (website) {
        let qrcodeContainer = document.getElementById("qrcode");
        qrcodeContainer.innerHTML = "";
        new QRCode(qrcodeContainer, website);

        document.getElementById("qrcode-container").style.display = "block";
        
    } else {
        alert("Please enter a valid URL");
    }
}
        </script>
@endsection