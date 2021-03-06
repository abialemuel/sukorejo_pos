@extends('layouts.app')

@section('title')
    Pembayaran Pembelian - Anugerah Cahaya
@endsection


@push('additional-style')
    <!-- Custom styles for this page -->
    <link href="{{ url('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ url('startbootstrap/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

@endpush

@push('additional-script')
    @include('includes.table-script')
    <script src="{{ url('startbootstrap/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>       

@endpush

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Pembayaran Pembelian</h1>
        </div>
        <?php $role = Auth::user()->roles; ?>
        <form  id="export_form" action="{{ route('purchases.exportharian', 1) }}" method="GET">
            @csrf
            <!-- DataTales Example -->
            <div class="card shadow">
            
                <div class="card-body">
                    <div class="row mt-1 mb-1">
                        <div class="col-sm-8">
                            <label for="inputTanggal" class="col-sm-2 control-label">Pilih Tanggal</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <!-- <input placeholder="{{ date('Y-m-d') }}"  class="form-control datepicker" name="tanggal"> -->
                                    <input type="text" class="form-control datepicker" id="purchased_at" name="purchased_at" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="inputTanggal" class="col-sm-2 control-label"></label>
                            <div class="col-sm-4">
                                <input type="submit" 
                                    name="export_excel" 
                                    value="Export ke Excel&nbsp;" class="btn btn-info"
                                    style="border-color: #1D6F42; background-color: #1D6F42; margin-left: -525px; margin-top: 7px;">
                                    

                                <!-- <a href="{{  route('purchases.exportharian', 1) }}" class="btn btn-warning btn-sm" 
                                    style="border-color: #1D6F42; background-color: #1D6F42; margin-left: -525px; margin-top: 10px;">
                                    Export ke Excel&nbsp;<i class="fa fa-file-excel" aria-hidden="true"></i> 
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

            
        <!-- DataTales Example -->
        <div class="card shadow mb-4 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style=" font-size: 12px; text-align: center;">
                            <tr>
                                <th>Nota Pembelian</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Kode Petani</th>
                                <th>Nama Petani</th>
                                <th>Total</th>
                                @if($role == "USER")
                                <th>Status</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody style=" font-size: 12px;">
                            @foreach ($purchase_orders as $purchase_order)
                                <tr>
                                    <td>{{ $purchase_order->getPOId() }}</td>
                                    <td>{{ $purchase_order->getStringDate() }}</td>
                                    <td>{{ $purchase_order->farmer["farmer_code"] }}</td>
                                    <td>{{ $purchase_order->farmer["name"] }}</td>
                                    <td>{{ $purchase_order->amount }}</td>
                                    

                                    @if($role == "USER")
                                        @if($purchase_order->isPaid()=='Lunas')
                                        <td>Lunas</td>
                                        @else
                                        <td>
                                            <center> 
                                                <a href="{{ route('purchases.editpayment', $purchase_order->id) }}" class="btn btn-info btn-sm">
                                                    Pembayaran &nbsp;<i class="fa fa-pencil-alt"></i>
                                                </a>
                                            </center>
                                        </td>
                                        @endif
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('add-item')



<script>
    //Date picker
    $(function(){
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
@endpush