@extends('layouts.app')

@section('title')
    Laporan Pembelian
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
            <h1 class="h3 mb-2 text-gray-800">Laporan Pembelian</h1>
        </div>
            

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Kode AC</th>
                    <th>Kode Petani</th>
                    <th>Tiam</th>
                    <th>Bruto</th>
                    <th>Netto</th>
                    <th>Price</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>
                          <td>{{ $purchase->id }}</td>
                          <td>{{ $purchase->ac_code }}</td>
                          <td>{{ $purchase->farmer_code }}</td>
                          <td>{{ $purchase->tiam }}</td>
                          <td>{{ $purchase->bruto }}</td>
                          <td>{{ $purchase->netto }}</td>
                          <td>{{ $purchase->price }}</td>
                          <td>
                            <a href="dokter/{{$purchase->id}}/edit">
                              <button class="btn btn-primary btn-sm">
                                <i class="fa fa-edit">Edit</i>
                              </button>
                            </a>
                            <a href="dokter/{{$purchase->id}}/hapus">
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