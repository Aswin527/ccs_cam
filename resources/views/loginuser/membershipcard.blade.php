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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Card</title>
    <style>
        :root {
            --primary-color: #00715d;
            --secondary-color: #166534;
            --background-color: #f0f2f5;
            --text-color: #333333;
            --white-color: #ffffff;
            --border-color: #dddddd;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--background-color);
            font-family: Arial, sans-serif;
            color: var(--text-color);
        }

        .profile-card {
            background-color: var(--white-color);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 4px 8px var(--shadow-color);
            padding: 20px;
            position: relative;
            margin: 50px auto;
            max-width: 600px;
        }

        .profile-logo {
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 8px 8px 0 0;
            padding: 10px;
        }

        .profile-logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            border-radius: 50%;
            border: 2px solid var(--white-color);
        }

        .profile-logo h4 {
            margin: 0;
            font-size: 18px;
            color: var(--white-color);
        }

        .profile-content {
            display: flex;
            align-items: flex-start;
            padding-top: 20px;
        }

        .profile-image img {
            border-radius: 8px;
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
            color: var(--primary-color);
        }

        .member-info {
            margin-top: 10px;
        }

        .barcode {
            position: absolute;
            bottom: 20px;
            right: 20px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 5px;
            background-color: var(--white-color);
            box-shadow: 0 2px 4px var(--shadow-color);
        }

        .barcode img {
            width: 70px;
            border-radius: 8px;
        }

        .download-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .download-buttons button {
            margin: 0 10px;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: var(--white-color);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .download-buttons button:hover {
            background-color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .profile-content {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .profile-image {
                margin-bottom: 20px;
            }

            .profile-details {
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <article class="profile-card" id="profile-card">
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
                            <p><strong>Member ID:</strong> {{ Auth::user()->membership_number }}</p>
                            <p><strong>Nationality:</strong> {{ Auth::user()->nationality }}</p>
                            <p><strong>Phone:</strong> {{ Auth::user()->mobile }}</p>
                        </div>
                    </div>
                </div>
                <div class="barcode">
                    <img src="/assets/images/dummy-qr.png" alt="QR Code">
                </div>
            </article>
            <div class="download-buttons">
                <button onclick="downloadAsPNG()">Download as PNG</button>
                <button onclick="downloadAsPDF()">Download as PDF</button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function downloadAsPNG() {
            html2canvas(document.querySelector('#profile-card')).then(canvas => {
                const link = document.createElement('a');
                link.href = canvas.toDataURL('image/png');
                link.download = 'membership-card.png';
                link.click();
            });
        }

        function downloadAsPDF() {
            html2canvas(document.querySelector('#profile-card')).then(canvas => {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                const imgData = canvas.toDataURL('image/png');
                const imgProps = doc.getImageProperties(imgData);
                const pdfWidth = doc.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                doc.save('membership-card.pdf');
            });
        }
    </script>
</body>
</html>

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