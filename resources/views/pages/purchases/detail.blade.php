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
                <div class="table-responsive">
                    
                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Created At: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $purchase->created_at }}</p>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Updated At: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $purchase->updated_at }}</p>
                            </div>
                        </div>
                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>AC Code: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $purchase->ac_code }}g</p>
                            </div>
                        </div>
                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Tiam: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $purchase->tiam }}</p>
                            </div>
                        </div>
                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Brutto: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $purchase->bruto }} Kg</p>
                            </div>
                        </div>
                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Netto: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $purchase->netto }} Kg</p>
                            </div>
                        </div>
                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Nama Petani: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $purchase->farmer["name"] }}</p>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Created By: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $purchase->user["email"] }}</p>
                            </div>
                        </div>
                    
                    
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection