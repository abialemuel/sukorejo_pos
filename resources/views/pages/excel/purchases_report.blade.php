<!DOCTYPE html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>ID Nota Pembelian</th>
                    <th>Kode Petani</th>
                    <th>Nama Petani</th>
                    <th>Kode AC</th>
                    <th>Seri Tani</th>
                    <th>Brutto</th>
                    <th>Netto</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Status</th>

                </tr>
            </thead>

            
            <tbody>
                @foreach ($purchase_order->purchases as $purchase)
                <tr>
                    <td>{{ $purchase_order->getPOid() }}</td>
                    <td>{{ $purchase_order->farmer['farmer_code'] }}</td>
                    <td>{{ $purchase_order->farmer['name'] }}</td>
                    <td>{{ $purchase['ac_code'] }}</td>
                    <td>{{ $purchase['seri_tani'] }}</td>
                    <td>{{ $purchase['bruto'] }}</td>
                    <td>{{ $purchase['netto'] }}</td>
                    <td>{{ $purchase['price'] }}</td>
                    <td>{{ $purchase->getTotalAmount() }}</td>
                    <td>{{ $purchase->isPaid() }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
