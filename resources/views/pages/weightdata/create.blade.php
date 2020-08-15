@extends('layouts.app')

@section('title')
    Input Timbangan - POS
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
                                <div class="input-group date">
                                    <!-- <input placeholder="{{ date('Y-m-d') }}"  class="form-control datepicker" name="tanggal"> -->
                                    <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" placeholder="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive col-sm-12">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="weightdatatable">
                            <thead class="text-lg" style="text-align: center;">
                                <tr>
                                    <th>Bruto</th>
                                    <th>Netto</th>
                                    <th>
                                        <button type="button" class="btn btn-success btn-sm btnadd" name="add">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm" style="text-align: center;">
                                <tr>
                        
                                    <td><input type="number" min="1" class="form-control qty" name="bruto" ></td>
                                    <td><input type="number" min="1" class="form-control qty" name="netto" ></td>
                                    <td>
                                        <center>
                                            <button type="button" name="remove" class="btn btn-danger btn-sm btnremove">
                                                <i class="fa fa-trash"></i></button>
                                        </center>
                                    </td>
                                </tr> 
                                    
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
    //Date picker
    $(function(){
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });

    $(document).ready(function(){
            
        //Button Add
        $(document).on('click','.btnadd',function(){
            
            var html='';
            html+='<tr>';
                    
            html+='<td><input type="number" min="1" class="form-control qty" name="bruto" ></td>'
            html+='<td><input type="number" min="1" class="form-control qty" name="netto" ></td>';
            html+='<td><center><button type="button" name="remove" class="btn btn-danger btn-sm btnremove"><i class="fa fa-trash"></i></button></td></center></tr>'; 
                    
            $('#weightdatatable').append(html);        
        }) // btnadd end here 

        //Button Remove
        $(document).on('click','.btnremove',function(){
         
            $(this).closest('tr').remove();             
        }) // btnremove end here  
    });
</script>
@endpush
