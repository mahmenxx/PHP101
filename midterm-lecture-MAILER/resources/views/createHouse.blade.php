<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Add New House</h1>
        <form action="{{ route('house.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="bedrooms" class="form-label">Number of Bedrooms</label>
                <input type="number" class="form-control" id="bedrooms" name="bedrooms" required>
            </div>
            <div class="mb-3">
                <label for="bathrooms" class="form-label">Number of Bathrooms</label>
                <input type="number" step="0.5" class="form-control" id="bathrooms" name="bathrooms" required>
            </div>
            <button type="submit" class="btn btn-primary">Create House</button>
        </form>
    </div>
</body>
</html>
