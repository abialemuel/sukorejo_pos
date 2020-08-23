<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan - Anugerah Cahaya</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page { size: 10,5cm 14,8cm landscape; }
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
            width:60px;
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
        
        <caption style="position: absolute; text-align: left; display: block;">
            {{ $sales_order->getSOId() }}
        </caption>
        <h4 style="text-align: right">Anugerah Cahaya</h4>
        <p style="text-align: right">Sukorejo, {{ $sales_order->getStringDate() }}</p>




        <table style="position: absolute; left: -150px; width: 100px; ">
            <thead>
                <tr>
                    <th>Seri Gudang</th>
                    <th>Seri Jarum</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $sales_order['warehouse_code'] }}</td>
                    <td>{{ $sales_order['needle_code'] }}</td>
                </tr>
            </tbody>
        </table>

        <table style="position: absolute; top: 80px; left: -3px; width: 445px; ">
            <thead>
                <tr>
                    <th>Tiam</th>
                    <th>Brutto</th>
                    <th>Netto</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales_order->sales as $sale)
                    <tr>
                        <td>{{ $sale['tiam'] }}</td>
                        <td>{{ $sale['bruto'] }}</td>
                        <td>{{ $sale['netto'] }}</td>
                        <td>{{ $sale['price'] }}</td>
                        <td>{{ $sale->getTotalAmount() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>
