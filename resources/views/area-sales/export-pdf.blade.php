<!DOCTYPE html>
<html>
<head>
    <title>Area Sales</title>
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
    <h2>Data Area Sales</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Toko</th>
                <th>Area Sales</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kode_toko }}</td>
                    <td>{{ $item->area_sales}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>