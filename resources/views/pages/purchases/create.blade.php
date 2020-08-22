@extends('layouts.app')

@section('title')
    Input Data Pembelian - Anugerah Cahaya
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

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Pembelian</h1>
        </div>
            


        <!-- form start -->
        <form  id="purchase_form" action="{{ route('purchases.store') }}" method="POST">
            @csrf

            <!-- DataTales Example -->
            <div class="card shadow">
                <div class="card-body">


                    <div class="row mt-4 mb-5">
                        <div class="col-sm-6">
                            <label for="inputFarmerCode" class="col-sm-6 control-label">Nama Petani</label>

                            <div class="col-sm-8">
                            
                                <select class="kode-petani form-control" name="farmer_id">
                                    @foreach ($farmers as $farmer)
                                        <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
                                    @endforeach
                                </select>    
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="inputTanggal" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-12">
                                <div class="input-group date">
                                    <!-- <input placeholder="{{ date('Y-m-d') }}"  class="form-control datepicker" name="tanggal"> -->
                                    <input type="text" class="form-control datepicker" id="purchased_at" name="purchased_at" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive col-sm-12 mb-5">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="purchasetable">
                            <thead class="text-lg" style="text-align: center;">
                                <tr>
                                    <th>Seri AC</th>
                                    <th>Tiam</th>
                                    <th>Brutto</th>
                                    <th>Netto</th>
                                    <th>Harga Beli</th>
                                    <th>
                                        <button type="button" class="btn btn-success btn-sm btnadd" name="add">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                <tr>
                                    <td><input type='text' min='1' class='form-control' name='purchases[0][ac_code]' id='purchases[0][ac_code]' required></td>
                                    <td><input type="text" min="1" class="form-control" name="purchases[0][tiam]" id="purchases[0][tiam]" required></td>
                                    <td><input type="number" min="1" class="form-control qty bruto" name="purchases[0][bruto]" id="purchases[0][bruto]" required></td>
                                    <td><input type="number" min="1" class="form-control qty netto" name="purchases[0][netto]" id="purchases[0][netto]" required readonly></td>
                                    <td><input type="number" min="1" class="form-control qty price" name="purchases[0][price]" id="purchases[0][price]" required></td>
                                    <td>
                                        <center>
                                            <button type="button" name="remove" class="btn btn-danger btn-sm btnremove"><i class="fa fa-trash"></i></button>
                                        </center>
                                    </td>
                                </tr>
                            </thead>
                            <tbody class="text-sm" style="font-size: 11px; text-align: center;">
                                
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

                                    <input type="number" class="form-control total" name="txttotal" id="txttotal" required readonly>
                                    <input type="button" id= "hitung_total" name="hitung_total" value="Hitung Total" class="btn btn-primary"  style="margin-left: 10px;">
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

                                    <input type="text" class="form-control" name="txtpaid"  id="txtpaid" value=0 required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row col-sm-6 col-lg-6">
                        <div class="col-sm-6 col-lg-6">
                            <div align="center">
                            <input type="submit" id= "simpan_cetak" name="submit_value" value="Simpan & Cetak" class="btn btn-success">
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

        var i = 1;
        //Button Add
        $(document).on('click','.btnadd',function(){
            
            var html='';
            html+=`<tr>`;
            html+=`<td><input type='text' min='1' class='form-control' name='purchases[${i}][ac_code]' id='purchases[${i}][ac_code]' required></td>`
            html+=`<td><input type="text" min="1" class="form-control" name="purchases[${i}][tiam]" id='purchases[${i}][tiam]' required></td>`
            html+=`<td><input type="number" min="1" class="form-control qty bruto" name="purchases[${i}][bruto]" id="purchases[${i}][bruto]" required></td>`
            html+=`<td><input type="number" min="1" class="form-control qty netto" name="purchases[${i}][netto]" id="purchases[${i}][netto]" required readonly></td>`
            html+=`<td><input type="number" min="1" class="form-control qty price" name="purchases[${i}][price]" id="purchases[${i}][price]" required></td>`
            html+=`<td><center><button type="button" name="remove" class="btn btn-danger btn-sm btnremove"><i class="fa fa-trash"></i></button></td></center></tr>`; 

            i+=1
            $('#purchasetable').append(html);                
            
        }); // btnadd end here 
        

        //Button Remove
        $(document).on('click','.btnremove',function(){
         
            $(this).closest('tr').remove(); 
            // calculate(0,0);
            // $("#txtpaid").val(0);
            
        }) // btnremove end here  

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

        // count total amount
        $("#hitung_total").click(function(e){
            var stillExist = true;
            var i = 0;
            var sumTotal = 0
            while (stillExist) {
                netto = document.getElementById(`purchases[${i}][netto]`);
                price = document.getElementById(`purchases[${i}][price]`);
                if  (netto != null && price != null) {
                    sumRow = netto.value * price.value;
                    sumTotal += sumRow;
                } else {
                    stillExist = false;
                }

                i += 1;
            }
            document.getElementById('txttotal').value = sumTotal;
     }) 



        
    });
</script>
@endpush