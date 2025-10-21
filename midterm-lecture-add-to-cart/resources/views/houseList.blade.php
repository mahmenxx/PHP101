<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>House List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>

    <div class="container my-5">
        @session('successMessage')
            <div class="alert alert-success">
                {{ session('successMessage') }}
            </div>
        @endsession

        <h1 class="mb-4">House Listings</h1>
        <div class="row">
            @foreach($houses as $house)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $house->address }}</h5>
                            <p class="card-text">Price: ${{ number_format($house->price, 2) }}</p>
                            <p class="card-text">Bedrooms: {{ $house->bedrooms }}</p>
                            <p class="card-text">Bathrooms: {{ $house->bathrooms }}</p>
                            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?cs=srgb&dl=pexels-binyaminmellish-106399.jpg&fm=jpg" alt="House Image" class="img-fluid">
                            <a href="{{ route('house.view', ['id' => $house->id]) }}" class="btn btn-primary mt-2">View Details</a>
                            <form action="{{ route('house.delete', ['id' => $house->id]) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Are you sure you want to delete this house?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('house.createForm') }}" class="btn btn-primary"> Add New House</a>
    </div>


</body>
</html>
