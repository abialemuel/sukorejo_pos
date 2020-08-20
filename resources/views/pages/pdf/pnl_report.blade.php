<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>

        @page { size: 10,5cm 14,8cm landscape; }
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            width:auto;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #000;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }

        td, tr, th{
            padding:10px;
            border:1px solid #000;
            width:125px;
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
        <caption style="position: absolute; text-align: left; margin-left:6%; display: block;">
          Laporan Laba Rugi Tanggal : 
        </caption>
        <!-- <caption style="position: absolute; text-align: left; margin-left:6%; display: block;">
          Laporan Laba Rugi Tanggal :  $reports->created_at 
        </caption> -->
        
        <h3 style="text-align: right; margin-right: 7%">Anugerah Cahaya</h3>
        <p style="text-align: right; margin-right: 7%">Sukorejo</p>
        

        <table style="margin:0 auto; position: absolute; top: 175px; left: -10px; width: 200px; ">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Total Purchases</th>
                    <th>Total Sales</th>
                </tr>
            </thead>

            
            <tbody>
                <tr>
                    <td>{{ $reports }}</td>
                    <td>{{ $reports }}</td>
                    <td>{{ $reports }}</td>
                    
                </tr>
                
                
            </tbody>
        </table>

    </div>
</body>
</html>