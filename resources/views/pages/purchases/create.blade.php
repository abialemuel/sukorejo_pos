@extends('layouts.app')

@section('title')
    Pembelian - POS
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
        <form  action="{{ route('purchases.store') }}" method="POST" name="">
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
                                    <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" >
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
                                    <th>
                                        <button type="button" class="btn btn-success btn-sm btnadd" name="add">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm" style="font-size: 11px; text-align: center;">
                                
                            </tbody>
                        </table>
                    </div>                    

                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row col-sm-6 col-lg-6">
                        <div class="col-sm-6 col-lg-6">
                            <div align="center">
                                <input type="submit" value="Simpan & Cetak" class="btn btn-success">

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div align="center">
                                <input type="submit" value="Simpan Data Pembelian" class="btn btn-info">
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

        var i = 0;
        //Button Add
        $(document).on('click','.btnadd',function(){
            
            var html='';
            html+=`<tr>`;
            html+=`<td><input type='text' min='1' class='form-control qty' name='purchases[${i}][ac_code]' ></td>`
            html+=`<td><input type="text" min="1" class="form-control qty" name="purchases[${i}][tiam]" ></td>`
            html+=`<td><input type="number" min="1" class="form-control qty" name="purchases[${i}][bruto]" ></td>`
            html+=`<td><input type="number" min="1" class="form-control qty" name="purchases[${i}][netto]" ></td>`
            html+=`<td><input type="number" min="1" class="form-control qty" name="purchases[${i}][price]" ></td>`;
            html+=`<td><center><button type="button" name="remove" class="btn btn-danger btn-sm btnremove"><i class="fa fa-trash"></i></button><center></td></center></tr>`; 

            i+=1
            $('#purchasetable').append(html);
                        
                
            // $(".productid").on('change' , function(e){
                
            //     var productid = this.value;
            //     var tr=$(this).parent().parent();  
            //     $=ajax({
                    
            //         url:"getproduct.php",
            //         method:"get",
            //         data:{id:productid},
            //         success:function(data){
                        
            //         //console.log(data); 
            //         tr.find(".pname").val(data["pname"]);
            //         tr.find(".stock").val(data["pstock"]);
            //         tr.find(".price").val(data["saleprice"]); 
            //         tr.find(".qty").val(1);
            //         tr.find(".total").val( tr.find(".qty").val() *  tr.find(".price").val()); 
            //         calculate(0,0); 
            //         }   
            //     })   
            // })           
        }); // btnadd end here 
        

        //Button Remove
        $(document).on('click','.btnremove',function(){
         
            $(this).closest('tr').remove(); 
            calculate(0,0);
            $("#txtpaid").val(0);
            
        }) // btnremove end here  
    });
</script>
@endpush