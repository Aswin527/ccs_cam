@extends('layouts.admin')
@section('title','Voucher | Home')
@section('content')

                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Voucher</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Beneficery</th>
                                                <th>Payment Mode</th>
                                                <th>Amount</th>
                                                <th>Currency</th>
                                                <th>Bank</th>
                                                <th>Remark</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($data as $data)
                                                 <?php $user = DB::table('users')->where('id',$data->beneficery)->first();
                                                 $bank = DB::table('admin_bank')->where('id',$data->bank)->first();
                                                 
                                                 ?>
                                                
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$data->date}}</td>
                                                        <td>{{$data->type}}</td>
                                                        <td>@if($user){{$user->firstname}}{{$user->lastname}}@endif</td>
                                                        <td>{{$data->payment_category}}</td>
                                                        <td><?php echo abs($data->amount);?></td>
                                                        <td> @if($data->currency ==1 )
                                                          Doller (USD)
                                                           @else
                                                           KHR (៛)
                                                           @endif
                                                         </td>
                                                         <td>@if($bank){{$bank->bank_name}}@endif</td>
                                                         <td>{{$data->remarks}}</td>
                                                         <td><a href="/home/voucher/show/{{$data->id}}" target="_blank"class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bx-smile label-icon"></i> Show</a>
                                                        <a href="/home/voucher/edit/{{$data->id}}" class="btn btn-warning waves-effect btn-label waves-light"><i class=" bx bx-edit-alt label-icon"></i> Edit</a></td>  </tr>
                                                    <?php $x++; ?>
                                            @endforeach
                                           
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                     </div>

                   

@endsection

@section('js')
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