<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Program Applications Report</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Program</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Education Level</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = 1;
            @endphp
            @foreach($applications as $application)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $application->trainingProgram->name }}</td>
                    <td>{{ $application->trainee->user->name }}</td>
                    <td>{{ $application->trainee->date_of_birth }}</td>
                    <td>{{ $application->trainee->phone }}</td>
                    <td>{{ $application->trainee->address }}</td>
                    <td>{{ $application->trainee->education_level }}</td>
                    <td>{{ $application->status }}</td>
                </tr>
            @php
                $counter++;
            @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>
