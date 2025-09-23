@include('layouts.header')

<div>
<div class="container-fluid">
        @if (session('successMessage'))
            <div class="alert alert-success">
                {{ session('successMessage') }}
            </div>
        @endif
        <h1>Product List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr>
                        <td>
                            {{ $product->id }}
                            @if($product->trashed())
                                <span class="badge bg-danger">Deleted</span>
                                <form action="/products/restore/{{ $product->id }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm mt-2">Restore</button>
                                </form>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            @if($product->price > 500)
                                ${{ number_format($product->price, 2) }}
                                <div class="text-danger">Expensive</div>
                            @else
                                ${{ number_format($product->price, 2) }}
                                <div class="text-success">Affordable</div>
                            @endif
                        </td>
                        <td>
                            <form action="/products/update/{{ $product->id }}" method="GET">
                                <button type="submit" class="btn btn-info">Edit</button>
                            </form>
                            <form action="/products/delete/{{ $product->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $products->links() }}
    <a href="/products/create" class="btn btn-primary">Create New Product</a>
</div>

@include('layouts.footer')
