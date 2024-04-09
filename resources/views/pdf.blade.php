<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance List</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Roboto", sans-serif;
            color: #000;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Attendance List</h2>
        <p>{{ $studySession->date->format('D, d M Y') }}</p>
        <p>{{ $studySession->studyGroup->name }} - {{ $studySession->studyGroup->course->first()->name }}</p>
    </div>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Attended</th>
            <th>Remarks</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($studySession->students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->name }}</td>
                <td>
                    @if($student->pivot->attended === 1)
                        <!-- Tick (Checkmark) -->
                        <div style="color: green;">Attended</div>
                    @else
                        <!-- Cross -->
                        <div style="color: red;">Absent</div>
                    @endif
                </td>
                <td>{{ $student->pivot->attended === 1? $student->pivot->status === 'late' ? 'Arrived late' : 'On time' : 'Absent' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
