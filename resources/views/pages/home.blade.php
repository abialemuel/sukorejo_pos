@extends('layouts.app')

@section('title')
    Admin - Dashboard
@endsection


@push('additional-style')
    <!-- Custom styles for this page -->
    <link href="{{ url('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush


@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 text-gray-800">Dashboard</h1>
        </div>
            

        <!-- Content Row - Stats Card-->
        
        <iframe width="1170" height="645" 
            src="https://datastudio.google.com/embed/reporting/df9e1d87-8438-44ce-90df-7d8679e3eef3/page/pbIbB" 
            frameborder="0" style="border:0">
        </iframe>

    </div>
    <!-- /.container-fluid -->


@endsection

@push('chart-script')
  <!-- Page level plugins -->
  <script src="{{ url('startbootstrap/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('startbootstrap/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ url('startbootstrap/js/demo/chart-pie-demo.js') }}"></script>
@endpush

