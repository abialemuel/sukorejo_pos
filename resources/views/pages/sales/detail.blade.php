@extends('layouts.app')

@section('title')
    Detail Data Penjualan - Anugerah Cahaya
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
            <h1 class="h3 mb-2 text-gray-800">Data Penjualan</h1>
        </div>
            

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    
                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Created At: </p>
                            </div>
                            <div class="col-sm-3">
                                <p>{{ $sale_orders->created_at }}</p>
                            </div>

                            <div class="col-sm-2">
                                <p>Updated At: </p>
                            </div>
                            <div class="col-sm-3">
                                <p>{{ $sale_orders->updated_at }}</p>
                            </div>
                        </div>

                        <div class="row mb-5 mt-4">
                            <div class="col-sm-2">
                                <p>Tanggal Penjualan: </p>
                            </div>
                            <div class="col-sm-3">
                                <p>{{ $sale_orders->sold_at }}</p>
                            </div>

                            <div class="col-sm-2">
                                <p><strong>Dibuat Oleh: </strong></p>
                            </div>
                            <div class="col-sm-3">
                                <p>{{ $sale_orders->user["email"] }}</p>
                            </div>
                        </div>

                        <div class="row mb-5 mt-4">
                            <div class="col-sm-2">
                                <p>Seri Gudang: </p>
                            </div>
                            <div class="col-sm-3">
                                <p>{{ $sale_orders->warehouse_code }}</p>
                            </div>

                            <div class="col-sm-2">
                                <p><strong>Seri Jarum: </strong></p>
                            </div>
                            <div class="col-sm-3">
                                <p>{{ $sale_orders->needle_code }}</p>
                            </div>
                        </div>


                        <table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
                            <thead style=" font-size: 12px; text-align: center;">
                                <tr>
                                    <th>Tiam</th>
                                    <th>Brutto</th>
                                    <th>Netto</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody style=" font-size: 12px;">
                                @foreach ($sale_orders->sales as $sale)
                                    <tr>
                                        <td>{{ $sale->tiam }}</td>
                                        <td>{{ $sale->bruto }}</td>
                                        <td>{{ $sale->netto }}</td>
                                        <td>{{ $sale->price }}</td>
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