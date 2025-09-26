<!DOCTYPE html>
<html>
<head>
    <title>Penjualan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 6px;
            border: 1px solid #000;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Data Penjualan</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Toko</th>
                <th>Nominal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kode_toko }}</td>
                    <td>{{ number_format($item->nominal_transaksi, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>