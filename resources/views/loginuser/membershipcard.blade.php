@extends('loginuser.layouts')
@section('meta_title','')
@section("css")

 
  <style>
    .qr-code {
      max-width: 70px;
      margin: 10px;
    }
  </style>
@endsection
@section('content')
<style>
   body {
    background-color: #f0f2f5;
    font-family: Arial, sans-serif;
}

.profile-card {
    background-color: #ffffff;
    border: 1px solid #dddddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    display: flex;
    align-items: flex-start;
    max-width: 500px;
    margin: auto;
    flex-direction: column;
    justify-content: flex-start;
    position: relative; /* Add relative positioning to the card container */
}

.profile-logo {
    display: flex;
    flex-direction: row;
    margin-right: 20px;
    justify-content: space-between;
    align-items: center;
}

.profile-logo img {
    width: 50px;
    height: 50px;
}

.profile-logo h4 {
    margin-top: 10px;
    font-size: 18px;
    text-align: center;
}

.profile-content {
    display: flex;
    align-items: flex-start;
    width: 100%;
}

.profile-image img {
    border-radius: 8%;
    border: none;
    width: 120px;
    height: 150px;
    object-fit: cover;
    margin-right: 20px;
}

.profile-details {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.profile-username {
    font-size: 24px;
    margin: 0;
}

.member-info {
    margin-top: 10px;
}

.barcode {
    position: absolute; /* Position the QR code absolutely */
    bottom: 10px; /* 10px from the bottom */
    right: 10px; /* 10px from the right */
    border: 1px solid #dddddd;
    border-radius: 8px;
    padding: 5px;
}

.barcode img {
    width: 70px;
    border-radius: 8px;
}

.row.justify-content-center {
    display: flex;
    justify-content: center;
}
</style>
<section>
<div class="row justify-content-center mt-5">
    <div class="col-lg-8">
        <article class="profile-card">
            <div class="profile-logo">
                <img src="/assets/images/ccs-small-logo.jpg" alt="CCS Logo">
                <h4>Cambodian Chemical Society</h4>
            </div>
            <div class="profile-content">
                <div class="profile-image">
                    <img src="{{ Auth::user() ? asset('images/' . Auth::user()->photo) : asset('admin_assets/images/users/avatar-1.jpg') }}" alt="Profile Image">
                </div>
                <div class="profile-details">
                    <h2 class="profile-username">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
                    <div class="member-info">
                        <p><strong>Member ID:</strong> XYZ123</p>
                        <p><strong>Nationality:</strong> Cambodian</p>
                        <p><strong>Phone:</strong> +1234567890</p>
                    </div>
                </div>
            </div>
            <div class="barcode">
                <img src="/assets/images/dummy-qr.png" alt="QR Code">
            </div>
        </article>
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
        new QRCode(qrcodeContainer, website,{
           width: 400,
    height: 400,
        });

        document.getElementById("qrcode-container").style.display = "block";
        
    } 
}
        </script>
@endsection