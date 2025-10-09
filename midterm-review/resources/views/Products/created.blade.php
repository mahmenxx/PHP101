<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="container">
    <div class="container mt-5">
        <h1 class="text-success">Product Created Successfully</h1>
        <p>Name: {{ $product->name }}</p>
        <p>Description: {{ $product->description }}</p>
        <p>Price: ${{ $product->price }}</p>

    </div>

    <a href="/products/create" class="btn btn-primary">Create Another Product</a>
</body>
</html>
