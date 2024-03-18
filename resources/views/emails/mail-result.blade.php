<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 90%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 auto; /* Membuat container menjadi rata tengah */
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #333; /* Warna teks hitam */
        }
        th {
            background-color: #f2f2f2;
        }
        strong {
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #333; /* Warna teks hitam */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Test Result</h2>
        <p><strong>Name:</strong> {{ ucfirst($data['name']) }}</p>
        <p><strong>Event:</strong> {{ $data['event'] }}</p>
        <p><strong>Test Date:</strong> {{ \Carbon\Carbon::now()->toDateString() }}</p>
        <p><strong>Score:</strong></p>
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $scoreArray = json_decode($data['score'], true);
                @endphp
                @foreach($scoreArray as $category => $score)
                    <tr>
                        <td>{{ $category }}</td>
                        <td>{{ $score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            &copy; {{ date('Y') }} Universitas Kristen Krida Wacana
        </div>
    </div>

</body>
</html>
