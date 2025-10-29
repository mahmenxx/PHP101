<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Bag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Edit Bag</h1>
        <form method="POST" action="/bags/{{ $bag->id }}/edit" class="m-5">
            @csrf
            <div class="mb-3">
                <label for="brand" class="form-label">Bag Brand:</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $bag->brand }}" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="text" class="form-control" id="color" name="color" value="{{ $bag->color }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $bag->price }}" required>
            </div>
            <div class="mb-3">
                <label for="owner" class="form-label">Owner:</label>
                <input type="text" class="form-control" id="owner" name="owner" value="{{ $bag->owner }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Bag</button>
        </form>
        <a href="/bagsList" class="btn btn-secondary">Back to Bags List</a>
    </div>

</body>
</html>
