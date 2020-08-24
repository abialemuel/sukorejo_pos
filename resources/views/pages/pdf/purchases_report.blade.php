<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pembelian - Anugerah Cahaya</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page { size: 13,9cm 24,1cm landscape; }
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:8px;
            margin:0;
        }
        .container{
            margin:0 auto;
            width:auto;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:14px;
            margin-bottom:7px;
        }
        table{
            border:1px solid #000;
            border-collapse:collapse;
            margin:0 auto;
            width:370px;
        }

        td, tr, th{
            padding:5px;
            border:1px solid #000;
            width:80px;
        }
        th{
            background-color: #f3f3f3;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table style="position: absolute; left: -320px; width: 100px; ">
            <caption style="text-align: left; display: block;">
                  {{ $purchase_order->getPOId() }}
            </caption>
            <thead>
                <tr>
                    <th>Kode Petani</th>
                    <th>Nama Petani</th>
                </tr>
            </thead>  
            <tbody>
                <tr>
                    <td>{{ $purchase_order->farmer['farmer_code'] }}</td>
                    <td>{{ $purchase_order->farmer['name'] }}</td>
                </tr>               
            </tbody>
        </table>
        <h4 style="text-align: right">Anugerah Cahaya</h4>
        <p style="text-align: right">Sukorejo, {{ $purchase_order->getStringDate() }}</p>




        <table style="position: absolute; top: 90px; left: -5px; width: 820px; ">
            <thead>
                <tr>
                    <th>Kode AC</th>
                    <th>Seri Tani</th>
                    <th>Brutto</th>
                    <th>Netto</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>

            
            <tbody>
              @foreach ($purchase_order->purchases as $purchase)
                <tr>
                    <td>{{ $purchase['ac_code'] }}</td>
                    <td>{{ $purchase['seri_tani'] }}</td>
                    <td>{{ $purchase['bruto'] }}</td>
                    <td>{{ $purchase['netto'] }}</td>
                    <td>{{ $purchase['price'] }}</td>
                    <td>{{ $purchase->getTotalAmount() }}</td>
                </tr>
              @endforeach
            </tbody>
        </table>

        <table style="position: absolute; bottom: -360px; left: 320px; width: 120px; ">
            <thead>
                <tr>
                    <th>Tgl. Pelunasan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $purchase_order->getPaidDate() }}</td>
                    <td>{{ $purchase_order->amount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
