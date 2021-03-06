@extends('layouts.app')

@section('title')
    Daftarkan Petani - Anugerah Cahaya
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
            <h1 class="h3 mb-2 text-gray-800">Pendaftaran Petani</h1>
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
            

        <form class="form-horizontal" action="{{ route('farmers.store') }}" method="POST" name="">
            @csrf

            <div class="form-group">
                <label for="inputKodePetani" class="col-sm-2 control-label">Kode Petani</label>
                <div class="col-sm-12">
                    <input type="text" 
                            class="form-control" 
                            id="inputKodePetani" 
                            name="farmer_code"
                            placeholder="Kode Petani" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputNamaPetani" class="col-sm-2 control-label">Nama Petani</label>
                <div class="col-sm-12">
                    <input type="text" 
                            class="form-control" 
                            id="inputNamaPetani" 
                            name="name"
                            placeholder="Nama Petani" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputArea" class="col-sm-2 control-label">Area / Desa Petani</label>
                <div class="col-sm-12">
                    <input type="text" 
                            class="form-control" 
                            id="inputArea" 
                            name="area"
                            placeholder="Area / Desa Petani" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress" class="col-sm-2 control-label">Alamat Lengkap Petani</label>
                <div class="col-sm-12">
                    <textarea class="form-control" 
                            id="inputAddress" 
                            name="address"
                            placeholder="Alamat Lengkap Petani" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div align="center">
                    <button type="submit" class="btn btn-info">Simpan Data Petani</button>
                </div>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->


@endsection