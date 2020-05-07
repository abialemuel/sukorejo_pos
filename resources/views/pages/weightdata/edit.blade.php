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
            <h1 class="h3 mb-2 text-gray-800">Ubah Data Timbangan</h1>
        </div>
            
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- form start -->

        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-body">

                <form action="{{ route('weightdata.update', $weight_data->id) }}" method="POST" name="">
                    @csrf
                    @method('PUT')

                    <div class="row mt-4 mb-5">
                        <div class="col-sm-6">
                            <label for="inputDate" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive col-sm-12">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="weightdatatable">
                            <thead class="text-lg" style="text-align: center;">
                                <tr>
                                    <th>Bruto</th>
                                    <th>Netto</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm" style="text-align: center;">
                                <tr>
                                    <td>
                                        <input type="number" min="1" class="form-control qty" name="bruto" value="{{ $weight_data->bruto }}" >
                                    </td>
                                    <td>
                                        <input type="number" min="1" class="form-control qty" name="netto" value="{{ $weight_data->netto }}" >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                

                    <hr class="sidebar-divider d-none d-md-block">
                    <div align="center">
                        <button class="btn btn-info" type="submit">Perbaharui Data Timbangan</button>
                    </div>
                </form>


            </div>
        </div>



            
        </form>

    </div>
    <!-- /.container-fluid -->


@endsection
