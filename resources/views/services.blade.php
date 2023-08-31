<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: center;
        }

        table th, table td {
            border: 1px solid #eee;
            padding: 5px;
        }

        table th {
            background-color: #0faabc;
            color: #fff;
        }
    </style>
</head>
<body>

    <h1>All Services</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        @foreach($services as $service)
        <tr>
            <td>
                @if($loop->first)
                {{ 'First' }}
                @elseif($loop->last)
                {{ 'Last' }}
                @else
                {{ $service[0] }}
                @endif
            </td>
            <td>{{ $service[1] }}</td>
            <td>{{ $service[2] }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
