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
        <?php
        $i = 0;
        foreach($services as $service){ ?>
        <tr>
            <td><?php
            if($i == 0) {
                echo 'First';
            }else if($i == count($service)) {
                echo 'Last';
            }else {
                echo $service[0];
            }
            ?></td>
            <td><?php echo $service[1] ?></td>
            <td><?php echo $service[2] ?></td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>

</body>
</html>
