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
            


        <!-- form start -->
        <form action="" method="post" name="">


            <!-- DataTales Example -->
            <div class="card shadow">
                <div class="card-body">


                    <div class="row mt-4 mb-5">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-sm-6 control-label">Kode Petani</label>

                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-sm-4 control-label">Nama Petani</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 mb-5">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-sm-6 control-label">Desa</label>

                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive col-sm-12">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="text-lg" style="text-align: center;">
                                <tr>
                                    <th>Seri AC</th>
                                    <th>Brutto</th>
                                    <th>Netto</th>
                                    <th>Harga Beli</th>
                                    <th>
                                        <button class="btn btn-success btn-sm">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm" style="text-align: center;">
                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>


                                <td>
                                    <center>
                                        <form action="" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </center>
                                </td>
                            </tbody>
                        </table>
                    </div>
                    

                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row col-sm-6 col-lg-6">
                        <div class="col-sm-6 col-lg-6">
                            <div align="center">
                                <input type="submit" name="btnsaveorder" value="Simpan & Cetak" class="btn btn-success">

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div align="center">
                                <input type="submit" name="btnsaveorder" value="Simpan" class="btn btn-info">
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>



            
        </form>

    </div>
    <!-- /.container-fluid -->


@endsection