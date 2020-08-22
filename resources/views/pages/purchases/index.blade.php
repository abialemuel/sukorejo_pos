@extends('layouts.app')

@section('title')
    Data Pembelian - Anugerah Cahaya
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
            <h1 class="h3 mb-2 text-gray-800">Pembelian</h1>
        </div>
        <?php $role = Auth::user()->roles; ?>

            
        @if($role == "USER")
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style=" font-size: 12px; text-align: center;">
                            <tr>
                                <th>No.Nota</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Kode Petani</th>
                                <th>Nama Petani</th>
                                <th>Desa</th>
                                <th>Total</th>
                                <th>Status</th>

                                <th>Print</th>
                                <th>Detail</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody style=" font-size: 12px;">
                            @foreach ($purchase_orders as $purchase_order)
                                <tr>
                                    <td>{{ $purchase_order->getPOId() }}</td>
                                    <td>{{ $purchase_order->getStringDate() }}</td>
                                    <td>{{ $purchase_order->farmer["farmer_code"] }}</td>
                                    <td>{{ $purchase_order->farmer["name"] }}</td>
                                    <td>{{ $purchase_order->farmer["area"] }}</td>
                                    <td>{{ $purchase_order->amount }}</td>
                                    <td>{{ $purchase_order->isPaid() }}</td>
                                    <td>
                                        <center> 
                                            <a href="{{  route('purchases.printPdf', $purchase_order->id) }}" target="_blank" class="btn btn-warning btn-sm">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </a>
                                        </center>
                                    </td>
        
                                    <td>
                                        <center> 
                                            <a href="{{ route('purchases.show', $purchase_order->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </center>
                                    </td>
        
                                    <td>
                                        <center> 
                                            <a href="{{ route('purchases.edit', $purchase_order->id) }}" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <form action="{{ route('purchases.destroy', $purchase_order->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

    </div>
@endsection