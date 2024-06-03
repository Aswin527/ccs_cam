@extends('layouts.admin')
@section('title','Home')
@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
@endsection
@section('content')

<?php 
  foreach($position as $positions){
      $positioncounts = DB::table('users')->where('porganization',$positions->id)->count();
      $membershippoints[] = [
                "y" => $positioncounts,
                "label" =>$positions->name,
            ];
  }
  
  
   foreach($ocategory as $ocategorys){
      $organizationcounts = DB::table('organization')->where('organizaion_category',$ocategorys->name)->count(); 
      $organizationpoints[] = [
                "y" => $organizationcounts,
                "label" =>$ocategorys->name,
            ];
   }

   foreach($pcategory as $pcategorys){
        $pcategorycounts = DB::table('donations')->where('donation_type', $pcategorys->id)->count();
        $pcategorypoints[] = [
                "y" => $pcategorycounts,
                "label" => $pcategorys->name,
        ];
   }
                
                
                
 
 


?>

  <script>
      window.onload = function() {
 
var member = new CanvasJS.Chart("membership", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Membership Graph"
	},
	axisY: {
		title: "Membership Graph (in no)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## no",
		dataPoints: <?php echo json_encode($membershippoints, JSON_NUMERIC_CHECK); ?>
	}]
});
var organ = new CanvasJS.Chart("organization", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Organization Graph"
	},
	axisY: {
		title: "Organization Graph (in no)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## no",
		dataPoints: <?php echo json_encode($organizationpoints, JSON_NUMERIC_CHECK); ?>
	}]
});
var payment = new CanvasJS.Chart("payment", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Financial Graph"
	},
	axisY: {
		title: "Financial Graph (in no)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## no",
		dataPoints: <?php echo json_encode($pcategorypoints, JSON_NUMERIC_CHECK); ?>
	}]
});
organ.render();
member.render();
payment.render(); 
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
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="member">
            <h4>Membership Overview</h4>
        </div>
    </div>
</div>    
   <div class="row">
       
       <div class="col-lg-5">
            <div class="row">
                 <div class="col-md-6">
                      
                       <div class="custom icon">
                        	<h4>{{$user}}</h4>
                            <p class="blue">Total User</p>
                     </div>
                    </div>
                @foreach($position as $positon)
                 <?php $positioncount = DB::table('users')->where('porganization',$positon->id)->count();?>
                 <div class="col-md-6">
                      
                      <div class="custom icon">
                        	<h4>@if($positioncount) {{$positioncount}} @else 0 @endif</h4>
                            <p class="blue">{{$positon->name}}</p>
                     </div>
                    </div>
                 @endforeach   
            </div>
       </div>
       <div class="col-lg-7">
               <div id="membership" style="height: 270px; width: 100%;"></div>
              
   </div> 
   </div> 
   
    

    
  
  
  
  <div class="row">
    <div class="col-lg-12">
        <div class="member">
            <h4>Organization Overview</h4>
        </div>
    </div>
  </div>    
   <div class="row">
       
       <div class="col-lg-5">
            <div class="row">
                 <div class="col-md-6">
                      
                      <div class="custom icon">
                        	<h4>{{$organization}}</h4>
                            <p class="blue">Total Organization Category</p>
                     </div>
                    </div>
                @foreach($ocategory as $ocategory)
                 <?php $organizationcount = DB::table('organization')->where('organizaion_category',$ocategory->name)->count();?>
                 <div class="col-md-6">
                      <div class="custom icon">
                        	<h4>@if($organizationcount) {{$organizationcount}} @else 0 @endif</h4>
                            <p class="blue">{{$ocategory->name}}</p>
                     </div>
                    </div>
                 @endforeach   
            </div>
       </div>
       <div class="col-lg-7 mb-20">
                  <div id="organization" style="height: 180px; width: 100%;"></div>

   </div> 
   </div> 

   <div class="row">
    <div class="col-lg-12">
        <div class="member">
            <h4>Financial Overview</h4>
        </div>
    </div>
  </div>    
   <div class="row">
       
       <div class="col-lg-5">
            <div class="row">
                 <div class="col-md-6">
                      
                      <div class="custom icon">
                        	<h4>{{$payment}}</h4>
                            <p class="blue">Total Payment Category</p>
                     </div>
                    </div>
                @foreach($pcategory as $pcategory)
                 <?php $pcategorycount = DB::table('donations')->where('donation_type',$pcategory->id)->count();?>
                 <div class="col-md-6">
                      <div class="custom icon">
                        	<h4>@if($pcategorycount) {{$pcategorycount}} @else 0 @endif</h4>
                            <p class="blue">{{$pcategory->name}}</p>
                     </div>
                    </div>
                 @endforeach   
            </div>
       </div>
       <div class="col-lg-7 mb-20">
                  <div id="payment" style="height: 180px; width: 100%;"></div>

   </div> 
   </div> 
   
  <!--  <div class="row">-->
  <!--  <div class="col-lg-12">-->
  <!--      <div class="member">-->
  <!--          <h4>FINANCIAL OVERVIEW IN DOLLER($)</h4>-->
  <!--      </div>-->
  <!--  </div>-->
  <!--  <div class="col-lg-3">-->
  <!--          <div class="row">-->
  <!--               <div class="col-md-12">-->
  <!--                    <div class="custom icon">-->
  <!--                      	<h4>41</h4>-->
  <!--                          <p class="blue">Total Debit Amount in USD</p>-->
  <!--                   </div>-->
  <!--                  </div>-->
                    
                    
  <!--                  <div class="col-md-12">-->
  <!--                    <div class="custom icon">-->
  <!--                      	<h4>41</h4>-->
  <!--                          <p class="blue">Total Credit Amount in USD</p>-->
  <!--                   </div>-->
  <!--                  </div>-->
  <!--                  <div class="col-md-12">-->
  <!--                    <div class="custom icon">-->
  <!--                      	<h4>41</h4>-->
  <!--                          <p class="blue">Balance</p>-->
  <!--                   </div>-->
  <!--                  </div>-->
                   
                    
                
  <!--          </div>-->
  <!--     </div>-->
  <!--     <div class="col-lg-6">-->
  <!--          <div id="organization" style="height: 180px; width: 100%;"></div>-->
  <!--     </div>-->
  <!--     <div class="col-lg-3">-->
  <!--         <div class="row">-->
  <!--               <div class="col-md-12">-->
  <!--                    <div class="custom icon">-->
  <!--                      	<h4>41</h4>-->
  <!--                          <p class="blue">Total Amount in (in %)</p>-->
  <!--                   </div>-->
  <!--                  </div>-->
                    
                    
  <!--                  <div class="col-md-12">-->
  <!--                    <div class="custom icon">-->
  <!--                      	<h4>41</h4>-->
  <!--                          <p class="blue">Total Credit Amount</p>-->
  <!--                   </div>-->
  <!--                  </div>-->
  <!--                  <div class="col-md-12">-->
  <!--                    <div class="custom icon">-->
  <!--                      	<h4>41</h4>-->
  <!--                          <p class="blue">Balance Amount</p>-->
  <!--                   </div>-->
  <!--                  </div>-->
                   
                    
                
  <!--          </div>-->
  <!--     </div>-->
  <!--</div>-->

    
  


@endsection

@section('js')
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>


@endsection

