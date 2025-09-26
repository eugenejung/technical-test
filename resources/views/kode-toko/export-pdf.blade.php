<!DOCTYPE html>
<html>
<head>
    <title>Master Kode Toko</title>
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
    <h2>Data Master Kode Toko</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Toko Baru</th>
                <th>Kode Toko Lama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kode_toko_baru }}</td>
                    <td>{{ $item->kode_toko_lama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>