@extends('layouts.app')

@section('title')
    Detail Data Pembelian - Anugerah Cahaya
@endsection


@push('additional-style')
    <!-- Custom styles for this page -->
    <link href="{{ url('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('additional-script')
    @include('includes.table-script')
@endpush

@section('content')
    <?php $role = Auth::user()->roles; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Data Pembelian</h1>
        </div>
            
        @if($role == "USER")
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                    <div class="row mb-4 mt-4">
                        <div class="col-sm-2">
                            <p>Created At: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase_orders->created_at }}</p>
                        </div>

                        <div class="col-sm-2">
                            <p>Updated At: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase_orders->updated_at }}</p>
                        </div>
                    </div>
                    
                    
                    <div class="row mb-5 mt-4">
                        <div class="col-sm-2">
                            <p>Nama Petani: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase_orders->farmer["name"] }}</p>
                        </div>

                        <div class="col-sm-2">
                            <p>Desa Petani: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase_orders->farmer["area"] }}</p>
                        </div>
                    </div>
                    <div class="row mb-5 mt-4">
                        <div class="col-sm-2">
                            <p>Status Pembelian: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase_orders->isPaid() }}</p>
                        </div>

                        <div class="col-sm-2">
                            <p><strong>Dibuat Oleh: </strong></p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase_orders->user["name"] }}</p>
                        </div>

                    </div>


                    <table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
                        <thead style=" font-size: 12px; text-align: center;">
                            <tr>
                                <th>AC Code</th>
                                <th>Seri Tani</th>
                                <th>Brutto</th>
                                <th>Netto</th>
                                <th>Harga</th>  
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody style=" font-size: 12px;">
                            @foreach ($purchase_orders->purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->ac_code }}</td>
                                    <td>{{ $purchase->seri_tani }}</td>
                                    <td>{{ $purchase->bruto }} Kg</td>
                                    <td>{{ $purchase->netto }} Kg</td>
                                    <td>{{ $purchase->price }}</td>

                                    <td>{{ $purchase->getTotalAmount() }}</td>
                                    <td>{{ $purchase->isPaid() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                                        
                </div>
            
        </div>
        @endif

    </div>
    <!-- /.container-fluid -->


@endsection