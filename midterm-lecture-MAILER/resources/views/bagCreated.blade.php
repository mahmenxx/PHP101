<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bag created</title>
</head>
<body>
    <h1>Bag Created Successfully</h1>
    <p>Brand: {{ $bag->brand }}</p>
    <p>Color: {{ $bag->color }}</p>
    <p>Price: ${{ $bag->price }}</p>

    <a href="/createBagForm">Create Another Bag</a>
</body>
</html>

