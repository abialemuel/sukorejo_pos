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
                @foreach ($purchase_order as $po)
                <tr>
                    <td>{{ $po->created_at }}</td>
                    <td>{{ $po->farmer_code }}</td>
                    <td>{{ $po->farmer_name }}</td>
                    <td>{{ $po->ac_code }}</td>
                    <td>{{ $po->seri_tani }}</td>
                    <td>{{ $po->bruto }}</td>
                    <td>{{ $po->netto }}</td>
                    <td>{{ $po->price }}</td>
                    <td>{{ $po->jumlah }}</td>
                    <td>{{ $po->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
