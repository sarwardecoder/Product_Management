@extends('products.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{$message}}</strong>
        </div>

    @endif

    <div class="col-md-12 mt-5">




        <h1 class="d-flex justify-content-center m-3">All Products</h1>

        <table class="table table-hover">
            <thead class="table-dark">
                <th>SL</th>
                <th>Name</th>
                <th>Product ID</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Action</th>
            </thead>

            <tbody>

                @foreach ($products as $product)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>
                            <img src="{{ asset('products/' . $product->image) }}" class="rounded-circle" height="50"
                                width="50" />
                        </td>

                        <td class="d-flex justify-content-end">
                            <!-- <button class="btn btn-primary m-1" Action="products/show">View</button> -->
                            <button class="btn btn-info m-1"> <a href="products/{{$product->id}}/show">Show</a>
                                <button class="btn btn-warning m-1"> <a href="products/{{$product->id}}/edit">Edit</a>
                                </button>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger m-1"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>


        </table>
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

@endsection