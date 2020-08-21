@extends('layouts.app')

@section('title')
    Detail Data Timbangan - Anugerah Cahaya
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
                                <p>{{ $weight_data->created_at }}</p>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Updated At: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $weight_data->updated_at }}</p>
                            </div>
                        </div>
                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Brutto: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $weight_data->bruto }} Kg</p>
                            </div>
                        </div>
                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p>Netto: </p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $weight_data->netto }} Kg</p>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-sm-2">
                                <p><strong>Dibuat Oleh: </strong></p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $weight_data->user["email"] }}</p>
                            </div>
                        </div>
                    
                    
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection