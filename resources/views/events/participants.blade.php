@extends('layouts.admin')
@section('title', 'Event | Home')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<!-- JSZip (for Excel export) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- pdfmake (for PDF export) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!-- Buttons HTML5 export JS -->
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>

<script>
$(document).ready(function() {
    var currentDate = new Date().toISOString().slice(0, 10);
    $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Participants ' + currentDate
            }
        ],
        layout: {
            topStart: 'buttons'
        }
    });
});
</script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registered</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>User Type</th>
                            <th>Name</th>
                            <th>Organization Name</th>
                            <th>Designation</th>
                            <th>Country</th>
                            <th>Province</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>Food Preference</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participants as $index => $participant)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $participant->user_type === 'member' ? 'Member' : 'Guest' }}</td>
                                @if($participant->user_type === 'member')
                                    <td>{{ optional($participant->user)->firstname ?? 'N/A' }}</td>
                                    <td>{{ optional($participant->user)->organization ?? 'N/A' }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ optional($participant->user)->phone ?? 'N/A' }}</td>
                                    <td>{{ optional($participant->user)->email ?? 'N/A' }}</td>
                                @else
                                    <td>{{ $participant->guest_name }}</td>
                                    <td>{{ $participant->guest_organization }}</td>
                                    <td>{{ $participant->guest_designation }}</td>
                                    <td>{{ $participant->guest_country }}</td>
                                    <td>{{ $participant->guest_province }}</td>
                                    <td>{{ $participant->guest_phone }}</td>
                                    <td>{{ $participant->guest_email }}</td>
                                @endif
                                <td>{{ $participant->food_preference }}</td>
                                <td>{{ $participant->remarks }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
