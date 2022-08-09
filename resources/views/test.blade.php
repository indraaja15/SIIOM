<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Test</th>
            <th>Test1</th>
        </tr>
    </table>
    @foreach ($idbarang as $b )
    <tr>
        <td>{{ $b->barang_id }}</td>
        <td>{{ $b->qty }}</td>
    </tr>
    
        
    @endforeach
    
</body>
</html>