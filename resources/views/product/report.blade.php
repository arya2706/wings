<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<body class="g-sidenav-show  bg-gray-100">
 @include('layouts.menu')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            {{-- <div class="col-md-12">
                <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div> --}}
            <div class="col-md-12 mt-2">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                  </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-5">
                                <table class="table table-bordered display">
                                    <thead>
                                        <tr>
                                            <th>Transaction</th>
                                            <th>User</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Item</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reports as $report)
                                        <tr>
                                            <td>{{$report->document_code}}-{{$report->document_number}}</td>
                                            <td>{{$report->user}}</td>
                                            <td>Rp. {{number_format($report->sub_total)}}</td>
                                            <td>{{Carbon\Carbon::parse($report->date)->format('d M Y')}}</td>
                                            <td>{{$report->produce_name}} x {{$report->quantity}}</td>
                                        </tr>
                                        @endforeach
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.js')
    
  
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
       $(document).ready( function () {
    $('.display').DataTable();
} );
</script>
</body>
</html>