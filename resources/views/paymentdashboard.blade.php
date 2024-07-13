@extends('layouts.admin')
@section('title','Payment Dashboard')
@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
@endsection
@section('content')

<?php 
foreach($pcategory as $pcategorys){

    $pcategory_details = DB::table('donations') ->leftJoin('currency', 'currency.id', '=', 'donations.currency')
                ->select('currency.name as currency_name', DB::raw('SUM(donations.amount) as total_amount'))
                ->where('donations.donation_type', $pcategorys->id)
                ->groupBy('currency')
                ->get();

                $amount = 0;
                foreach($pcategory_details as $details) {
                    if($details->currency_name == 'Doller (USD)') {
                        $amount += $details->total_amount;
                    }
                    if($details->currency_name != 'Doller (USD)') {
                        foreach($currency_info as $info) {
                            if($info->name == $details->currency_name) {
                                $amount += ($details->total_amount*$info->value);
                            }
                        }
                    }
                }

                $pcategorypoints[] = [
                    "y" => $amount,
                    "label" => $pcategorys->name,
                ];
                
}

$receipt_details = [];
foreach($receipt as $receipt_data){
    $receipt_details = DB::table('vouchers') ->leftJoin('currency', 'currency.id', '=', 'vouchers.currency')
                ->select('currency.name as currency_name', DB::raw('SUM(vouchers.amount) as total_amount'))
                ->where('vouchers.category','Receipt')
                ->groupBy('currency')
                ->get();


    $receipt_amount = 0;
    foreach($receipt_details as $details) {
        if($details->currency_name == 'Doller (USD)') {
            $receipt_amount += $details->total_amount;
        }
        if($details->currency_name != 'Doller (USD)') {
            foreach($currency_info as $info) {
                if($info->name == $details->currency_name) {
                     $receipt_amount += ($details->total_amount*$info->value);
                }
            }
        }
    }

    $r_v_points[] = [
        "y" => $receipt_amount,
        "label" => $receipt_data->category,
    ];

    $voucher_details = DB::table('vouchers') ->leftJoin('currency', 'currency.id', '=', 'vouchers.currency')
    ->select('currency.name as currency_name', DB::raw('SUM(vouchers.amount) as total_amount'))
    ->where('vouchers.category','Voucher')
    ->groupBy('currency')
    ->get();


    $voucher_amount = 0;
    foreach($voucher_details as $details) {
    if($details->currency_name == 'Doller (USD)') {
    $voucher_amount += $details->total_amount;
    }
    if($details->currency_name != 'Doller (USD)') {
    foreach($currency_info as $info) {
        if($info->name == $details->currency_name) {
            $voucher_amount += ($details->total_amount*$info->value);
        }
    }
    }
}

$r_v_points[] = [
    "y" => $voucher_amount,
    "label" => 'Voucher',
];


    
    break;
}


$status_count = DB::table('donations')->select('status', DB::raw('COUNT(*) as count')) ->groupBy('status') ->get();
foreach($status_count as $status_info) {
    if($status_info->status == '1'){
        $status_list[] = [
            "y" => $status_info->count,
            "label" => "Approved",
        ];
    }
    if($status_info->status == '0'){
        $status_list[] = [
            "y" => $status_info->count,
            "label" => "Pending",
        ];
    }
    if($status_info->status != '0' && $status_info->status != '1'){
        $status_list[] = [
            "y" => $status_info->count,
            "label" => "Rejected",
        ];
    }
}


$currency_list = [];
foreach($currency_info as $currency_details) {
    $currency_list[$currency_details->id] = $currency_details->name;
}
       
 
 


?>
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

  <script>
    
 window.onload = function() {

var chart = new CanvasJS.Chart("allPaymentsChart", {
	animationEnabled: true,
	title: {
		text: "All Payments"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "$#,##0.##",
		indexLabel: "{label} {y}",
		dataPoints: <?php echo json_encode($pcategorypoints, JSON_NUMERIC_CHECK); ?>
	}]
});

var status_chart = new CanvasJS.Chart("allPaymentsChartStatusWise", {
	animationEnabled: true,
	title: {
		text: "All Payments Status Wise"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "#,##0.##",
		indexLabel: "{label} {y}",
		dataPoints: <?php echo json_encode($status_list, JSON_NUMERIC_CHECK); ?>
	}]
});

var r_v_chart = new CanvasJS.Chart("allreceiptvoucher", {
	animationEnabled: true,
	title: {
		text: "All Receipt/Voucher Wise"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "$#,##0.##",
		indexLabel: "{label} {y}",
		dataPoints: <?php echo json_encode($r_v_points, JSON_NUMERIC_CHECK); ?>
	}]
});


chart.render();
status_chart.render();
r_v_chart.render();
 }  
</script>


 <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Welcome Back <b>{{Auth::user()->firstname}} </b></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Payment Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


   <div class="row">
    <div class="col-lg-12">
        <div class="member">
            <h4>Payment Dashboard</h4>
        </div>
    </div>
  </div>    
   <div class="row">
       
       <div class="col-lg-6 mb-20">
            <div id="allPaymentsChart" style="height: 350px; width: 100%;"></div>
            <div id="allPaymentsChartStatusWise" class="mt-5 mb-5" style="height: 350px; width: 100%;"></div>
            <div id="allreceiptvoucher" class="mt-5 mb-5" style="height: 350px; width: 100%;"></div>

        
       </div> 
       
       <div class="col-lg-6 mb-20">
            <div id="allPaymentsDetails" >
                <div class="card">
                    <div class="card-header pt-3 pb-0">
                        <div class="card-title">All Payments List <a href="/home/user/all/payments" class="btn btn-warning mb-3" style="float:right;"> All Payments</a></div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Pay type</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x=1;?>
                                @foreach($donations as $donation_info)
                                <?php $category = DB::table('payment_catgeory')->where('id',$donation_info->donation_type)->first();  ?>
                                <tr id="">
                                    <td>{{$x}}</td>
                                    <td>@if($category){{$category->name}}@endif</td> 
                                    <td> @if($donation_info->currency ==1 )
                                                          Doller (USD)
                                                           @else
                                                           KHR (៛)
                                                           @endif
                                                         </td>
                                    <td>{{$donation_info->amount}}</td>
                                    <td>@if($donation_info->status ==0)
                                            Pending
                                        @elseif($donation_info->status ==1)
                                            Approved
                                        @else
                                            Reject
                                        @endif
                                    </td>
                                </tr>
                                <?php $x++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       </div>
        
   </div>
   
   <div class="row">
   <div class="col-lg-6 mb-20">
            <div id="allPaymentsDetails" >
                <div class="card">
                    <div class="card-header pt-3 pb-0">
                        <div class="card-title">All Receipt List  <a href="/home/receipt/" class="btn btn-warning mb-3" style="float:right;"> All Receipt</a></div>
                    </div>
                    <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Beneficery</th>
                                                <th>Payment Mode</th>
                                                <th>Amount</th>
                                                <th>Currency</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($receipt as $data)
                                                 <?php $user = DB::table('users')->where('id',$data->beneficery)->first();
                                                 $bank = DB::table('admin_bank')->where('id',$data->bank)->first();
                                                 
                                                 ?>
                                                
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>@if($user){{$user->firstname}}{{$user->lastname}}@endif</td>
                                                        <td>{{$data->payment_category}}</td>
                                                        <td><?php echo abs($data->amount);?></td>
                                                        <td> @if($data->currency ==1 )
                                                          Doller (USD)
                                                           @else
                                                           KHR (៛)
                                                           @endif
                                                         </td>
                                                      </tr>
                                                    <?php $x++; ?>
                                            @endforeach
                                           
                                            </tbody>
                                        </table>
                    </div>
                </div>
            </div>
       </div>
       <div class="col-lg-6 mb-20">
            <div id="allPaymentsDetails" >
                <div class="card">
                    <div class="card-header pt-3 pb-0">
                        <div class="card-title">All Voucher List <a href="/home/voucher/" class="btn btn-warning mb-3" style="float:right;"> All Voucher</a></div>
                    </div>
                    <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Beneficery</th>
                                                <th>Payment Mode</th>
                                                <th>Amount</th>
                                                <th>Currency</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($voucher as $data)
                                                 <?php $user = DB::table('users')->where('id',$data->beneficery)->first();
                                                 $bank = DB::table('admin_bank')->where('id',$data->bank)->first();
                                                 
                                                 ?>
                                                
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>@if($user){{$user->firstname}}{{$user->lastname}}@endif</td>
                                                        <td>{{$data->payment_category}}</td>
                                                        <td><?php echo abs($data->amount);?></td>
                                                        <td> @if($data->currency ==1 )
                                                          Doller (USD)
                                                           @else
                                                           KHR (៛)
                                                           @endif
                                                         </td>
                                                         </tr>
                                                    <?php $x++; ?>
                                            @endforeach
                                           
                                            </tbody>
                                        </table>
                    </div>
                </div>
            </div>
       </div>
   </div>

    
  


@endsection


