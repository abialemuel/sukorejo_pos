@extends('layouts.app')

@section('title')
    Detail Data Timbangan - POS
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
            <h1 class="h3 mb-2 text-gray-800">Data Timbangan</h1>
        </div>
            

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                    <div class="row mb-4 mt-4">
                        <div class="col-sm-2">
                            <p>Created At: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase->created_at }}</p>
                        </div>

                        <div class="col-sm-2">
                            <p>Updated At: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase->updated_at }}</p>
                        </div>
                    </div>
                    <div class="row mb-4 mt-4">
                        <div class="col-sm-2">
                            <p>AC Code: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase->ac_code }}</p>
                        </div>

                        <div class="col-sm-2">
                            <p>Tiam: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase->tiam }}</p>
                        </div>
                    </div>
                    
                    <div class="row mb-4 mt-4">
                        <div class="col-sm-2">
                            <p>Brutto: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase->bruto }} Kg</p>
                        </div>

                        <div class="col-sm-2">
                            <p>Netto: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase->netto }} Kg</p>
                        </div>
                    </div>
                    
                    <div class="row mb-5 mt-4">
                        <div class="col-sm-2">
                            <p>Nama Petani: </p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase->farmer["name"] }}</p>
                        </div>

                        <div class="col-sm-2">
                            <p><strong>Created By: </strong></p>
                        </div>
                        <div class="col-sm-3">
                            <p>{{ $purchase->user["email"] }}</p>
                        </div>
                    </div>


                    <table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
                        <thead style=" font-size: 12px; text-align: center;">
                            <tr>
                                <th>ID</th>
                                <th>Kode AC</th>
                                <th>Kode Petani</th>
                                <th>Nama Petani</th>
                                <th>Desa</th>
                                <th>Brutto</th>
                                <th>Netto</th>
                                <th>Harga</th>
                                <th>Tiam</th>
                            </tr>
                        </thead>
                        <tbody style=" font-size: 12px;">

                                <tr>
                                    <td>{{ $purchase->id }}</td>
                                    <td>{{ $purchase->ac_code }}</td>
                                    <td>{{ $purchase->farmer["farmer_code"] }}</td>
                                    <td>{{ $purchase->farmer["name"] }}</td>
                                    <td>{{ $purchase->farmer["area"] }}</td>
                                    <td>{{ $purchase->bruto }}</td>
                                    <td>{{ $purchase->netto }}</td>
                                    <td>{{ $purchase->price }}</td>
                                    <td>{{ $purchase->tiam }}</td>
                                </tr>

                        </tbody>
                    </table>
                    
                                        
                </div>
            
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection