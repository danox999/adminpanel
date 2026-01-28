<!DOCTYPE html>
<html>
<head>
    <title>Karyawan Export</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Karyawan Export - {{ now()->format('Y-m-d') }}</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Jabatan</th>
                <th>Departemen</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawan as $k)
                <tr>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->nip }}</td>
                    <td>{{ $k->email }}</td>
                    <td>{{ $k->phone ?? '-' }}</td>
                    <td>{{ $k->jabatan }}</td>
                    <td>{{ $k->departemen }}</td>
                    <td>{{ $k->tanggal_masuk->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($k->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
