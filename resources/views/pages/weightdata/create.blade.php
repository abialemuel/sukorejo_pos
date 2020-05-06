@extends('layouts.app')

@section('title')
    Pembelian - POS
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
            <h1 class="h3 mb-2 text-gray-800">Input Data Timbangan</h1>
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

        <!-- form start -->

        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-body">

                <form action="{{ route('weightdata.store') }}" method="POST" name="">
                    @csrf

                    <div class="row mt-4 mb-5">
                        <div class="col-sm-6">
                            <label for="inputDate" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive col-sm-12">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="weightdatatable">
                            <thead class="text-lg" style="text-align: center;">
                                <tr>
                                    <th>Brutto</th>
                                    <th>Netto</th>
                                    <th>
                                        <button type="button" class="btn btn-success btn-sm btnadd" name="add">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm" style="text-align: center;">

                                
                            </tbody>
                        </table>
                    </div>
                

                    <hr class="sidebar-divider d-none d-md-block">
                    <div align="center">
                        <button class="btn btn-info" type="submit">Simpan Data Timbangan</button>
                    </div>
                </form>


            </div>
        </div>



            
        </form>

    </div>
    <!-- /.container-fluid -->


@endsection

@push('add-item')
<script>
    // //Date picker
    // $('#datepicker').datepicker({
    //     autoclose: true
    // });

    $(document).ready(function(){
            
        //Button Add
        $(document).on('click','.btnadd',function(){
            
            var html='';
                html+='<tr>';
                        
                html+='<td><input type="number" min="1" class="form-control qty" name="brutto" ></td>'
                html+='<td><input type="number" min="1" class="form-control qty" name="netto" ></td>';
                html+='<td><center><button type="button" name="remove" class="btn btn-danger btn-sm btnremove"><i class="fa fa-trash"></i></button><center></td></center></tr>'; 
                        
                $('#weightdatatable').append(html);
                        
                    
                    //Initialize Select2 Elements
                    // $('.productid').select2()
                        
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
        }) // btnadd end here 

        //Button Remove
        $(document).on('click','.btnremove',function(){
         
            $(this).closest('tr').remove(); 
            calculate(0,0);
            $("#txtpaid").val(0);
            
        }) // btnremove end here  
    });
</script>
@endpush
