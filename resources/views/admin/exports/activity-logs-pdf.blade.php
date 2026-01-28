<!DOCTYPE html>
<html>
<head>
    <title>Activity Logs Export</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Activity Logs Export - {{ now()->format('Y-m-d') }}</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Action</th>
                <th>Model</th>
                <th>Description</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->causer ? $log->causer->name : 'System' }}</td>
                    <td>{{ ucfirst($log->event ?? 'N/A') }}</td>
                    <td>{{ $log->subject_type ? class_basename($log->subject_type) : 'N/A' }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
