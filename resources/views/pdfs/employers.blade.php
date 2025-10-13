<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registered Employers</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 12px; 
            color: #333; 
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-height: 80px;
            margin-bottom: 10px;
        }
        .title {
            font-size: 20px;
            font-weight: bold;
            color: #030358;
            margin-top: 10px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }
        th { 
            background-color: #030358; 
            color: white;
            font-size: 14px;
        }
        tr:nth-child(even) { 
            background-color: #f9f9f9; 
        }
        tr:hover { 
            background-color: #f1f1f1; 
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('assets/img/logo.jpg') }}" alt="Logo">
        <div class="title">Registered Employers</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Sr. No.</th> 
                <th>Company Name</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employers as $employer)
                <tr>
                    <td>{{ $loop->iteration }}</td> <td>{{ $employer->company_name }}</td>
                    <td>{{ $employer->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>