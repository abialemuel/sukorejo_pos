@extends('layouts.app')

@section('title')
    Penjualan - POS
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
            <h1 class="h3 mb-2 text-gray-800">Penjualan</h1>
        </div>
            

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="font-size: 12px; text-align: center;">
                            <tr> 

                                <th>ID</th>
                                <th>Tanggal Penjualan</th>
                                <th>Seri Gudang</th>
                                <th>Seri Jarum</th>
                                <th>Tiam</th>
                                <th>Brutto</th>
                                <th>Netto</th>
                                <th>Harga</th>
                                <th>Total</th>

                                <th>Print</th>
                                <th>Detail</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>

                        <tbody style="font-size: 12px;">
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->created_at }}</td>
                                    <td>{{ $sale->warehouse_code }}</td>
                                    <td>{{ $sale->needle_code }}</td>
                                    <td>{{ $sale->tiam }}</td>
                                    <td>{{ $sale->bruto }}</td>
                                    <td>{{ $sale->netto }}</td>
                                    <td>{{ $sale->price }}</td>
                                    <td>{{ $sale->price }}</td>


                                    <td>
                                        <center> 
                                            <a href="{{  route('sales.printPdf', $sale->id) }}" target="_blank" class="btn btn-warning btn-sm">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </a>
                                        </center>
                                    </td>
        
                                    <td>
                                        <center> 
                                            <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </center>
                                    </td>
        
                                    <td>
                                        <center> 
                                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="d-inline">
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