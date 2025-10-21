<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    {{-- Custom CSS --}}
    <title>House: {{ $house->address }}</title>
</head>
<body>
    {{-- <img src={{asset('images/about-img.png')}}  style="width:110px;" alt="House Banner" class="img-fluid w-100 mb-4" style="max-height: 300px; object-fit: cover;"> --}}
    <div class="container my-5">
        <h1 class="mb-4">House Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Address: {{ $house->address }}</h5>
                <p class="card-text">Price: ${{ number_format($house->price, 2) }}</p>

               <p class="card-text">Bedrooms: {{ $house->bedrooms }}</p>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    @for($i = 0; $i < $house->bedrooms; $i++)
                        <div class="text-center" style="width:110px;">
                            <img class="w-100 rounded" src="https://media.istockphoto.com/id/1222623844/photo/master-bedroom-in-new-luxury-home-with-chandelier-and-large-bank-of-windows-with-view-of-trees.jpg?s=612x612&w=0&k=20&c=BuIObAMmOM6AZ2d2L9bCYh9tfxCCsdzeqWo6tizso9I=" alt="Bedroom {{ $i + 1 }}">
                            <div class="small mt-1">Bedroom {{ $i + 1 }}</div>
                        </div>
                    @endfor
                </div>

                <p class="card-text">Bathrooms: {{ $house->bathrooms }}</p>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    @for($i = 0; $i < $house->bathrooms; $i++)
                        <div class="text-center" style="width:110px;">
                            <img class="w-100 rounded" src="https://media.architecturaldigest.com/photos/5d2f3540dea3bc0008636368/master/pass/After-Photo-7.jpg" alt="Bathroom {{ $i + 1 }}">
                            <div class="small mt-1">Bathroom {{ $i + 1 }}</div>
                        </div>
                    @endfor
                </div>
            </div>
                <a href="{{ route('house.updateForm', ['id' => $house->id]) }}" class="btn btn-warning">Edit House</a>
                <a href="{{ route('house.list') }}" class="btn btn-primary">Back to Listings</a>

        </div>
    </div>
</body>
</html>
