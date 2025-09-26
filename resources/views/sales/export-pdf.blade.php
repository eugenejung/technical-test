<!DOCTYPE html>
<html>
<head>
    <title>Master Sales</title>
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
    <h2>Data Master Sales</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Sales</th>
                <th>Nama Sales</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kode_sales }}</td>
                    <td>{{ $item->nama_sales }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>