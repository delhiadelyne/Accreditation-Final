<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Training Program Applications Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
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
    <div class="header">
        <h1>Training Program Applications Report</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Institution Name</th>
                <th>Program Name</th>
                <th>Source of Competency</th>
                <th>Training Duration</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = 1;
            @endphp
            @foreach ($applications as $application)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $application->trainingProgram->institution->name }}</td>
                    <td>{{ $application->trainingProgram->name }}</td>
                    <td>{{ $application->trainingProgram->source_of_competency }}</td>
                    <td>{{ $application->trainingProgram->training_duration }} Months</td>
                    <td>{{ ucfirst($application->status) }}</td>
                </tr>
                @php
                    $counter++;
                @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>
