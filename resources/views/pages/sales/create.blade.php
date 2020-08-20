@extends('layouts.app')

@section('title')
    Penjualan - POS
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
            <h1 class="h3 mb-2 text-gray-800">Penjualan</h1>
        </div>
            


        <!-- form start -->
        <form  action="{{ route('sales.store') }}" method="POST" name="">
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
                                    <input type="text" class="form-control datepicker" id="sold_at" name="sold_at" placeholder="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive col-sm-12 mb-5">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="saletable">
                            <thead>
                                <tr style="font-size: 11px; text-align: center;">
                                    <th>Seri Gudang</th>
                                    <th>Seri Jarum</th>
                                    <th>Tiam</th>
                                    <th>Brutto</th>
                                    <th>Netto</th>
                                    <th>Harga</th>
                                    <th>
                                        <button type="button" class="btn btn-success btn-sm btnadd" name="add">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                <tr>
                                    <td><input type="text" min="1" class="form-control" name="sales[${i}][warehouse_code]" ></td>
                                    <td><input type="text" min="1" class="form-control" name="sales[${i}][needle_code]" ></td>
                                    <td><input type="text" min="1" class="form-control" name="sales[${i}][tiam]" ></td>
                                    <td><input type="number" min="1" class="form-control qty bruto" name="sales[${i}][bruto]" ></td>
                                    <td><input type="number" min="1" class="form-control qty netto" name="sales[${i}][netto]" ></td>
                                    <td><input type="number" min="1" class="form-control qty price" name="sales[${i}][price]" ></td>
                                    <td>
                                        <center><button type="button" name="remove" class="btn btn-danger btn-sm btnremove"><i class="fa fa-trash"></i></button></center>
                                    </td>
                                </tr>
                            </thead>
                            <tbody style="font-size: 11px; text-align: center;">
                               
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

                                    <input type="text" class="form-control total" name="txttotal" id="txttotal" required readonly>
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

                                    <input type="text" class="form-control" name="txtpaid"  id="txtpaid" required>
                                </div>
                            </div>

                        </div>
                    </div><!-- tax dis. etc -->
                    

                    <hr class="sidebar-divider d-none d-md-block mt-5">
                    <div class="row col-sm-6 col-lg-6">
                        <div class="col-sm-6 col-lg-6">
                            <div align="center">
                                <input type="submit" value="Simpan & Cetak" class="btn btn-success">

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div align="center">
                                <input type="submit" value="Simpan Data Penjualan" class="btn btn-info">
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
            
        var i = 1;
        //Button Add
        $(document).on('click','.btnadd',function(){
            
            var html='';
                html+='<tr>';
                        
                html+=`<td><input type="text" min="1" class="form-control" name="sales[${i}][warehouse_code]" ></td>`
                html+=`<td><input type="text" min="1" class="form-control" name="sales[${i}][needle_code]" ></td>`
                html+=`<td><input type="text" min="1" class="form-control" name="sales[${i}][tiam]" ></td>`
                html+=`<td><input type="number" min="1" class="form-control qty bruto" name="sales[${i}][bruto]" ></td>`
                html+=`<td><input type="number" min="1" class="form-control qty netto" name="sales[${i}][netto]" ></td>`
                html+=`<td><input type="number" min="1" class="form-control qty price" name="sales[${i}][price]" ></td>`
                html+=`<td><center><button type="button" name="remove" class="btn btn-danger btn-sm btnremove"><i class="fa fa-trash"></i></button></td></center></tr>`; 
                        
                i+=1
                $('#saletable').append(html);
                        
        }) // btnadd end here 

        //Button Remove
        $(document).on('click','.btnremove',function(){
         
            $(this).closest('tr').remove(); 
            // calculate(0,0);
            // $("#txtpaid").val(0);
            
        }) // btnremove end here  



        $(document).on('change','.bruto',function(){
         
            var bruto = $(this).closest('.bruto').val();
            
            var url = '{{ route("sales.getNetto", ":bruto") }}';
            url = url.replace(':bruto', bruto); 
            var tr=$(this).parent().parent();

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    if(response != null){
                        // $('.netto').val(response.netto);
                        tr.find(".netto").val(response["netto"]);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });  
        }) //netto ends here

        $(document).delegate(".price","keyup change" ,function(){
            calculate();
            
        }) //total bayar ends here

        function calculate(){  
            var price=0;
            var bruto=0;
            var netto=0;
            var total=0;         
            $(".price").each(function(){
                total = total+($(this).val()*1);     
            })
            $(".total").val(total.toFixed(2)); 
        }// function calculate end here 

    });
</script>
@endpush