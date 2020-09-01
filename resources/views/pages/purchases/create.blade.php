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
                                    <th>Seri Tani</th>
                                    <th>Brutto</th>
                                    <th>Netto</th>
                                    <th>Harga Beli</th>
                                    <th>Total</th>
                                    <th>Terbayar</th>
                                    <th>
                                        <button type="button" class="btn btn-success btn-sm btnadd" name="add">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm" style="font-size: 11px; text-align: center;">
                                <tr>
                                    <td><input type='text' min='1' class='form-control ac_code' name='purchases[0][ac_code]' id='purchases[0][ac_code]' required></td>
                                    <td><input type="text" min="1" class="form-control" name="purchases[0][seri_tani]" id="purchases[0][seri_tani]" required></td>
                                    <td><input type="number" min="1" class="form-control qty bruto" name="purchases[0][bruto]" id="purchases[0][bruto]" required></td>
                                    <td><input type="number" min="1" class="form-control qty netto" name="purchases[0][netto]" id="purchases[0][netto]" required readonly></td>
                                    <td><input type="number" min="1" class="form-control qty price" name="purchases[0][price]" id="purchases[0][price]" required></td>
                                    <td><input type="number" min="1" class="form-control qty total" name="purchases[0][total]" id="purchases[0][total]" required readonly></td>
                                    <td><input type="number" min="0" class="form-control qty amount" value=0 name="purchases[0][amount]" id="purchases[0][amount]" required></td>
                                    <td>
                                        <center>
                                            <button type="button" name="remove" class="btn btn-danger btn-sm btnremove"><i class="fa fa-trash"></i></button>
                                        </center>
                                    </td>
                                </tr>
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

                                    <input type="number" class="form-control total" name="txttotal" value="0" id="txttotal" required readonly>
                                    <input type="button" id= "hitung_total" name="hitung_total" value="Hitung Total" class="btn btn-primary" style="margin-left: 10px;">
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

                                    <input type="text" class="form-control" name="txtpaid"  id="txtpaid" value=0 required readonly>
                                </div>
                            </div>
                        </div>
                    </div><!-- tax dis. etc -->              

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
            html+=`<td><input type='text' min='1' class='form-control ac_code' name='purchases[${i}][ac_code]' id='purchases[${i}][ac_code]' required></td>`
            html+=`<td><input type="text" min="1" class="form-control" name="purchases[${i}][seri_tani]" id='purchases[${i}][seri_tani]' required></td>`
            html+=`<td><input type="number" min="1" class="form-control qty bruto" name="purchases[${i}][bruto]" id="purchases[${i}][bruto]" required></td>`
            html+=`<td><input type="number" min="1" class="form-control qty netto" name="purchases[${i}][netto]" id="purchases[${i}][netto]" required readonly></td>`
            html+=`<td><input type="number" min="1" class="form-control qty price" name="purchases[${i}][price]" id="purchases[${i}][price]" required></td>`
            html+=`<td><input type="number" min="1" class="form-control qty total" name="purchases[${i}][total]" id="purchases[${i}][total]" required readonly></td>`
            html+=`<td><input type="number" min="0" class="form-control qty amount" value=0 name="purchases[${i}][amount]" id="purchases[${i}][amount]" required></td>`
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

        // $(document).on('change','.ac_code',function(){
         
        //     var ac_code = $(this).closest('.ac_code').val();
        //     var contents = {},
        //     duplicates = false;
        //     $("#purchase_form tr").each(function() {
        //         var tdContent = $(this).text();
        //         if (contents[tdContent]) {
        //             duplicates = true;
        //             return false;
        //         }
        //         contents[tdContent] = true;
        //     });    
        //     if (duplicates)
        //     alert("There were duplicates.");
            
            
        // }) 



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
            var sumPaid = 0
            while (stillExist) {
                amount = document.getElementById(`purchases[${i}][amount]`);
                total = document.getElementById(`purchases[${i}][total]`);
                console.log(amount)
                console.log(total)
                if  (total != null && amount != null) {
                    sumTotal += parseInt(total.value);
                    sumPaid += parseInt(amount.value);
                } else {
                    stillExist = false;
                }

                i += 1;
            }
            document.getElementById('txttotal').value = sumTotal;
            document.getElementById('txtpaid').value = sumPaid;
         }) 

        $(document).on('change','.price',function(){
         
            var tr=$(this).parent().parent();
            var netto = tr.find(".netto").val();
            var price = $(this).closest('.price').val();
            var total = price * netto;
            
            tr.find(".total").val(total);
        }) 
    });
</script>
@endpush