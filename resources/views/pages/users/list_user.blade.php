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
                        <thead>
                            <tr style="font-size: 12px; text-align: center;"> 
                                <th>ID</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Seri Gudang</th>
                                <th>Seri Jarum</th>
                                <th>Tiam</th>
                                <th>Brutto</th>
                                <th>Netto</th>
                                <th>Harga</th>

                                <th>Tambah</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                <center> 
                                    <button type="button" name="add" class="btn btn-success btn-sm btnadd">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="#" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                </center>
                                
                            </td>
                            <td>
                                <center>
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </center>
                                
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection