<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>House created</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">House Created Successfully!</h1>
        <div class="alert alert-success" role="alert">
            The house at <strong>{{ $house->address }}</strong> has been created successfully.
        </div>
        <a href="{{ route('house.list') }}" class="btn btn-primary">Back to House Listings</a>
    </div>
</body>
</html>
