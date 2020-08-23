@extends('layouts.app')

@section('title')
    Ubah Data Pembelian - Anugerah Cahaya
@endsection

@push('additional-style')
    <link href="{{ url('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ url('startbootstrap/vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('startbootstrap/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

@endpush

@push('additional-script')
    @include('includes.table-script')
    <script src="{{ url('additionaljs/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ url('startbootstrap/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>       

@endpush

@section('content')
<?php $role = Auth::user()->roles; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Edit Pembelian</h1>
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
        @if($role == "USER")
        <!-- form start -->
        <form  id="purchase_form" action="{{ route('purchases.update', $purchase_orders->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- DataTales Example -->
            <div class="card shadow">
                <div class="card-body">


                    <div class="row mt-4 mb-5">
                        <div class="col-sm-6">
                            <label for="inputFarmerCode" class="col-sm-6 control-label">Nama Petani</label>

                            <div class="col-sm-8">
                            
                                <select class="kode-petani form-control" name="farmer_id">
                                        <option value="{{ $purchase_orders->farmer['id'] }}">{{ $purchase_orders->farmer['name'] }}</option>
                                </select>    
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="inputTanggal" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-12">
                                <div class="input-group date">
                                    <!-- <input placeholder="{{ date('Y-m-d') }}"  class="form-control datepicker" name="tanggal"> -->
                                    <p>{{ date('d-m-Y', strtotime($purchase_orders->created_at)) }}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive col-sm-12">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="purchasetable">
                            <thead class="text-lg" style="text-align: center;">
                                <tr>
                                    <th>Seri AC</th>
                                    <th>Tiam</th>
                                    <th>Brutto</th>
                                    <th>Netto</th>
                                    <th>Harga Beli</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm" style="font-size: 11px; text-align: center;">
                                @foreach ($purchase_orders->purchases as $purchase)
                                    <tr>

                                        <td><input type='text' min='1' class='form-control' name='purchases[{{ $loop->index }}][ac_code]' id='purchases[{{ $loop->index }}][ac_code]' value="{{ $purchase->ac_code }}" required readonly></td>
                                        <td><input type="text" min="1" class="form-control" name="purchases[{{ $loop->index }}][tiam]" id="purchases[{{ $loop->index }}][tiam]" value="{{ $purchase->tiam }}" required readonly></td>
                                        <td><input type="number" min="1" class="form-control qty bruto" name="purchases[{{ $loop->index }}][bruto]" id="purchases[{{ $loop->index }}][bruto]" value="{{ $purchase->bruto }}" required readonly></td>
                                        <td><input type="number" min="1" class="form-control qty netto" name="purchases[{{ $loop->index }}][netto]" id="purchases[{{ $loop->index }}][netto]" value="{{ $purchase->netto }}" required readonly></td>
                                        <td><input type="number" min="1" class="form-control qty price" name="purchases[{{ $loop->index }}][price]" id="purchases[{{ $loop->index }}][price]" value="{{ $purchase->price }}" required readonly></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-usd"></i>
                                    </div>

                                    <input type="number" class="form-control total" name="txttotal" id="txttotal" value="{{ $purchase_orders->amount }}" required readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            
                            <div class="form-group">
                                <label>Terbayar</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-usd"></i>
                                    </div>

                                    <input type="text" class="form-control" name="txtpaid"  id="txtpaid" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>                  

                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row col-sm-6 col-lg-6">
                        <div class="col-sm-6 col-lg-6">
                            <div align="center">
                            <input type="submit" id= "simpan_cetak" name="submit_value" value="Simpan & Cetak" class="btn btn-success" formtarget="_blank">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div align="center">
                                <input type="submit" name="submit_value" value="Simpan Data Pembelian" class="btn btn-info">
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </form>
        @endif

    </div>
    <!-- /.container-fluid -->


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

    $(document).ready(function(){

        $('.kode-petani').select2();


        $(document).on('change','.bruto',function(){
         
            var bruto = $(this).closest('.bruto').val();
            
            var url = '{{ route("purchases.getNetto", ":bruto") }}';
            url = url.replace(':bruto', bruto); 
            var tr=$(this).parent().parent();

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    if(response != null){
                        // $('.netto').closest('.netto').val(response.netto);
                        tr.find(".netto").val(response["netto"]);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });  
            
        }) 

        // open new tab for print pdf & reload page
        $("#simpan_cetak").click(function(e){
            e.preventDefault();
            const form = document.getElementById('purchase_form');

            var params = $('#purchase_form').serialize() + "&submit_value=simpan_cetak";
            
            var createdData;

            $.ajax({
                url: "{{ route('purchases.store') }}",
                method: 'post',
                data: params,
                async: false,
                success: function(response){
                    //------------------------
                    createdData = response;
                    //--------------------------
            }});

            var id = createdData['id'];
            var new_pdf_url = '{{ route("purchases.printPdf", ":id") }}';
            new_pdf_url = new_pdf_url.replace(':id', id); 
            window.open(new_pdf_url);
            window.location.reload();
        })



        
    });
</script>
@endpush