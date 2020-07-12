@extends('layouts.app')

@section('title')
    Pembelian - POS
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
            

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

                                <th>Print</th>
                                <th>Detail</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody style=" font-size: 12px;">
                            @foreach ($purchases as $purchase)
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
                                    <td>
                                        <center> 
                                            <button type="button" name="add" class="btn btn-warning btn-sm">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </button>
                                        </center>
                                    </td>
        
                                    <td>
                                        <center> 
                                            <button type="button" name="add" class="btn btn-success btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </center>
                                    </td>
        
                                    <td>
                                        <center> 
                                            <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
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

    </div>
@endsection