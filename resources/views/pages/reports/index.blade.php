@extends('layouts.app')

@section('title')
    Laporan Laba / Rugi - Anugerah Cahaya
@endsection


@push('additional-style')
    <!-- Custom styles for this page -->
    <link href="{{ url('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('additional-script')
    @include('includes.table-script')
@endpush

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Laporan Laba / Rugi</h1>
        </div>
            

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="font-size: 12px; text-align: center;">
                            <tr> 
                                <th>Date</th>                                
                                <th>Total Penjualan</th>
                                <th>Total Pembelian</th>
                                <th>Laba / Rugi</th>
                               
                                <!-- <th>Print</th> -->
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->created_at }}</td>
                                    <td>{{ $report->total_sales }}</td>
                                    <td>{{ $report->total_purchases }}</td>
                                    <td>{{ $report->total_laba_rugi }}</td>

                                    <!-- <td>
                                    
                                        <center> 
                                            <a href="{{  route('pnl.printPdf', $report->created_at) }}" target="_blank" class="btn btn-warning btn-sm">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </a>
                                        </center>
                                    </td> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection