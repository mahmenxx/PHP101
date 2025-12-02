<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bags List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container">

    @session('successMessage')
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endsession

    <h1>List of Bags</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Color</th>
                <th>Price</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bags as $bag)
                <tr>
                    <td>{{ $bag->brand }}</td>
                    <td>{{ $bag->color }}</td>
                    <td>${{ $bag->price }}</td>
                    <td>{{ $bag->owner }}</td>
                    <td>
                        <a href="/bags/{{ $bag->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                        <form method="POST" action="/bags/{{ $bag->id }}/delete" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/createBagForm">Create New Bag</a>

</body>
</html>
