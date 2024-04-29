@extends('layouts.admin')
@section('title','Voucher | Home')
@section('content')
@section('css')
 <link rel="stylesheet" href="/invoice/css/style.css">
@endsection



<div class="quatation" style="backgound-color:#f8f8f8">


  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="quatation-header">
          PAYMENT RECEIPT
        </h2>
      </div>
      <div class="col-lg-6">
        <div class="owner">

          <p>Cambodian Chemical Society </p>
          <p> No 72, Street 598, Boeung Kak II, Toul Kork, Phnom Penh, Cambodia </p>
          <p> info@ccs-cam.org </p>
          <p> <b>No.</b> : (855)16 839 279 </p>

        </div>
        <div class="customer">
          <h4>To : </h4>
          <p>{{@$user->firstname}}{{@$user->lastname}} </p>

          <p><b>Contact Person :</b>{{@$user->mobile}} </p>
          <p> <b>Email : </b>{{@$user->email}} </p>

        </div>
      </div>
      <div class="col-lg-6">
        <div class="cotation">
          <img width="150px" src="/assets/images/logo.jpg">
          <p><b>DATE : </b>{{$data->date}}</p>
          <p><b>VOUCHER NO. : </b>#{{$data->id}}</p>

        </div>
      </div>
      <?php $amount= abs($data->amount);?>
      <div class="col-lg-12">
        <div class="pay">
          <h4>PAYMENT RECEIPT</h4>
          <div class="pa">
            <p><b>RECEIVED AMOUNT:</b> {{$amount}} </p>
            <p><b>AMOUNT IN WORDS:</b>{{ucwords((new NumberFormatter('en_IN',
              NumberFormatter::SPELLOUT))->format($amount))}}</p>
            <p><b>PAYMENT MODE:</b> {{$data->payment_category}}</p>
            <p><b>CURRENCY :</b> {{$currency->name}}</p>

            <p><b>BEING:</b> {{$data->remarks}}</p>

            <h4>THANKS FOR DOING BUSINESS WITH US.</h4>
            <div class="pharma">
              <img src="/public/img/img18.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>









@endsection

@section('js')
 <script src="/invoice/js/jquery.min.js"></script>
          <script src="/invoice/js/jspdf.min.js"></script>
          <script src="/invoice/js/html2canvas.min.js"></script>
          <script src="/invoice/js/main.js"></script>
  <script>
 
function showDiv(select){
   if(select.value== "Bank"){
   document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
   } 
</script>
@endsection