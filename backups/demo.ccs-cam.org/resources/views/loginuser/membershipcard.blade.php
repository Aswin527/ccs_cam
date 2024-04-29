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
   

    
button,
input,
select,
textarea {
	font: inherit;
}

a {
	color: inherit;
}
/* End basic CSS override */

.profile {
	display: flex;
	align-items: center;
	flex-direction: column;
	padding: 3rem;
	width: 90%;
	max-width: 300px;
	/*background-color: #1b2028;*/
	border-radius: 16px;
	position: relative;
	border: 3px solid transparent;
	background-clip: padding-box;
	text-align: center;
	color: #f1f3f3;
	background-image: linear-gradient(
		135deg,
		rgba(#752e7c, 0.35),
		rgba(#734a58, 0.1) 15%,
		#1b2028 20%,
		#1b2028 100%
	);
	&:after {
		content: "";
		display: block;
		top: -3px;
		left: -3px;
		bottom: -3px;
		right: -3px;
		z-index: -1;
		position: absolute;
		border-radius: 16px;
	    background-image: linear-gradient(135deg, #98ade9, #6585bf 20%, #6792d7 30%, #405577 100%);
	}
}

.profile-image {
	border-radius: 50%;
	overflow: hidden;
	width: 175px;
	height: 175px;
	position: relative;
	img {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 100%;
	}
}

.profile-username {
	font-size: 1.5rem;
	font-weight: 600;
	margin-top: 1.5rem;
	color:#000;
}

.profile-user-handle {
	color: #7d8396;
}

.profile-actions {
	margin-top: 1.5rem;
	display: flex;
	align-items: center;
	justify-content: center;
	& > * {
		margin: 0 0.25rem;
	}
}

.btn {
	border: 0;
	background-color: transparent;
	padding: 0;
	height: 46px;
	display: flex;
	align-items: center;
	justify-content: center;
	cursor: pointer;
	line-height: 1;
	transition: 0.15s ease;

	&--primary {
		border-radius: 99em;
		background-color: #3772ff;
		background-image: linear-gradient(135deg, #5587ff, #3772ff);
		color: #fff;
		padding: 0 1.375em;
		&:hover,
		&:focus {
			background-size: 150%;
		}
	}

	&--icon {
		height: 46px;
		width: 46px;
		border-radius: 50%;
		border: 3px solid #343945;
		color: #7d8396;
		i {
			font-size: 1.25em;
		}

		&:hover,
		&:focus {
			border-color: #7d8396;
		}
	}
}

.profile-links {
	margin-top: 3.5rem;
}
.ccs-logo h4 {
    color: #000;
    font-size: 18px;
    margin: 16px 0px;
}

.link {
	text-decoration: none;
	color: #7d8396;
	margin-left: 0.375rem;
	margin-right: 0.375rem;
	i {
		font-size: 1.25em;
	}
}
.ccs-logo img {
    border-radius: 50%;
}
</style>

<div class="row">
    <div class="col-lg-3">
        
    </div>
    <div class="col-lg-6">
        <article class="profile">
            <div class="ccs-logo">
                <img src="/assets/images/ccs-small-logo.jpg" width="50px">
                <h4>Cambodian Chemical Society</h4>
            </div>
            <h2 class="memberships">MEMBERSHIPCARD</h2>
	<div class="profile-image">
	     
		<img src="@if(Auth::user()) /images/{{Auth::user()->photo}} @else /admin_assets/images/users/avatar-1.jpg @endif" />
	</div>
	<h2 class="profile-username">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h2>

	<div class="profile-links">
	   <div class="barcode my-0">
         <img src="/assets/images/dummy-qr.png" width="70px">
      </div>
	</div>
</article>
    </div>
</div>


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