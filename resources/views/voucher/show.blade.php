@extends('layouts.admin')
@section('title', 'Voucher | Home')

@section('css')
    <link rel="stylesheet" href="/invoice/css/style.css">
    <style>
        .voucher-container {
            background-color: #fff;
            font-family: 'Arial', sans-serif;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
        }
        .voucher-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .voucher-header h2 {
            font-size: 24px;
            font-weight: bold;
        }
        .owner, .customer, .details, .amounts, .thanks {
            margin: 20px 0;
        }
        .details p, .amounts p, .thanks p {
            margin: 5px 0;
        }
        .details img {
            width: 150px;
        }
        .thanks {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
        .footer-img img {
            width: 100%;
            height: auto;
            border-top: 2px solid #ddd;
            padding-top: 10px;
        }
        .download-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin: 20px 0;
        }
        .download-btn button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .download-btn button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
<div class="voucher-container" id="voucher">
    <div class="voucher-header">
        <div>
            <h2>PAYMENT VOUCHER</h2>
        </div>
        <div>
            <img src="/assets/images/logo.jpg" alt="Logo">
        </div>
    </div>
    <div class="owner">
        <p><strong>Cambodian Chemical Society</strong></p>
        <p>No 72, Street 598, Boeung Kak II, Toul Kork, Phnom Penh, Cambodia</p>
        <p>info@ccs-cam.org</p>
        <p><strong>No.:</strong> (855)16 839 279</p>
    </div>
    <div class="customer">
        <h4>To:</h4>
        <p>{{ @$user->firstname }} {{ @$user->lastname }}</p>
        <p><strong>Contact Person:</strong> {{ @$user->mobile }}</p>
        <p><strong>Email:</strong> {{ @$user->email }}</p>
    </div>
    <div class="details">
        <p><strong>Date:</strong> {{ $data->date }}</p>
        <p><strong>Voucher No.:</strong> #{{ $data->id }}</p>
    </div>
    <div class="amounts">
        <?php $amount = abs($data->amount); ?>
        <p><strong>Received Amount:</strong> {{ $amount }}</p>
        <p><strong>Amount in Words:</strong> {{ucwords((new NumberFormatter('en_IN',
          NumberFormatter::SPELLOUT))->format($amount))}}</p>
        <p><strong>Payment Mode:</strong> {{ $data->payment_category }}</p>
        <p><strong>Currency:</strong> {{ $currency->name }}</p>
        <p><strong>Being:</strong> {{ $data->remarks }}</p>
    </div>
    <div class="thanks">
        <p>THANK YOU.</p>
    </div>
        </hr>
</div>
<div class="download-btn">
    <button onclick="downloadPDF()">Download PDF</button>
</div>
@endsection

@section('js')
    <script src="/invoice/js/jquery.min.js"></script>
    <script src="/invoice/js/jspdf.min.js"></script>
    <script src="/invoice/js/html2canvas.min.js"></script>
    <script src="/invoice/js/main.js"></script>
    <script>
        function showDiv(select) {
            if (select.value == "Bank") {
                document.getElementById('hidden_div').style.display = "block";
            } else {
                document.getElementById('hidden_div').style.display = "none";
            }
        }

        function downloadPDF() {
            const voucher = document.getElementById('voucher');
            html2canvas(voucher).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgWidth = 210;
                const pageHeight = 295;
                const imgHeight = canvas.height * imgWidth / canvas.width;
                let heightLeft = imgHeight;
                let position = 0;

                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                pdf.save('payment_voucher.pdf');
            });
        }
    </script>
@endsection
