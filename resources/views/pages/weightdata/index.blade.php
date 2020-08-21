@extends('layouts.app')

@section('title')
    Data Timbangan - Anugerah Cahaya
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
                `    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style=" font-size: 12px; text-align: center;">
                        <tr>
                            <th>Dibuat Pada</th>
                            <th>Brutto</th>
                            <th>Netto</th>
                            
                            <th>Detail</th>
                            <th>Ubah</th>
                            <th>Hapus</th>
                        </tr>
                        </thead>
                        <tbody style=" font-size: 12px;">
                            @foreach ($weight_data as $weight)
                                <tr>
                                <td>{{ $weight->created_at }}</td>
                                <td>{{ $weight->bruto }}</td>
                                <td>{{ $weight->netto }}</td>


                                <td>
                                    <center> 
                                        <a href="{{ route('weightdata.show', $weight->id) }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </center>
                                </td>

                                <td>
                                    <center>
                                        <a href="{{ route('weightdata.edit', $weight->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                    </center>  
                                </td>
                                <td>
                                    <center>
                                        <form action="{{ route('weightdata.destroy', $weight->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </center>
                                </td>
                            
                            @endforeach

                        </tbody>
                    </table>`
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection