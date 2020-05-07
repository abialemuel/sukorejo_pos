@extends('layouts.app')

@section('title')
    Users Profile - POS
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
            <h1 class="h3 mb-2 text-gray-800">User Profile</h1>
        </div>
            

        <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="POST" name="">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $user->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-12">
                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $user->email }}">
                </div>
            </div>

            <div class="form-group">
                <div align="center">
                    <button type="submit" class="btn btn-info">Simpan Data</button>
                </div>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->


@endsection