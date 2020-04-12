@extends('layouts.app')

@section('title')
    Laporan Penjualan
@endsection


@push('additional-style')
    <!-- Custom styles for this page -->
    <link href="{{ url('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('additional-script')
<!-- Page level plugins -->
<script src="{{ url('startbootstrap/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('startbootstrap/js/demo/datatables-demo.js') }}"></script>
@endpush

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Laporan Penjualan</h1>
        </div>
            

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Kode Gudang</th>
                    <th>Kode Needle</th>
                    <th>Tiam</th>
                    <th>Bruto</th>
                    <th>Netto</th>
                    <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                          <td>{{ $sale->id }}</td>
                          <td>{{ $sale->warehouse_code }}</td>
                          <td>{{ $sale->needle_code }}</td>
                          <td>{{ $sale->tiam }}</td>
                          <td>{{ $sale->brutto }}</td>
                          <td>{{ $sale->netto }}</td>
                          <td>{{ $sale->price }}</td>
                          <td>
                            <a href="dokter/{{$sale->id}}/edit">
                              <button class="btn btn-primary btn-sm">
                                <i class="fa fa-edit">Edit</i>
                              </button>
                            </a>
                            <a href="dokter/{{$sale->id}}/hapus">
                              <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash">Hapus</i>
                              </button>
                            </a>
                          </td>
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