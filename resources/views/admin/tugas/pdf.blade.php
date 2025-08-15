<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Tugas</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        h1, h3 {
            text-align: center;
            margin: 0;
        }
        .info {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
        }
        th {
            text-align: center;
            background-color: #f9f9f9;
        }
        td {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Data User</h1>
    <div class="info">
        <h3>Tanggal : {{ $tanggal }}</h3>
        <h3>Pukul : {{ $jam }}</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tugas</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tugas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->nama }}</td>
                    <td>{{ $item->user->email }}</td>
                    <td>{{ $item->tugas }}</td>
                    <td>{{ $item->tanggal_mulai }}</td>
                    <td>{{ $item->tanggal_selesai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>