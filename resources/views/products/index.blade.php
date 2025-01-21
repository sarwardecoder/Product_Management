@extends('products.layout')

@section('content')
<div class="coll-md-12 mt-5">
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
        @foreach ($products as $product)
            <tbody>
                <td>{{$loop->index + 1}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->product_id}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td>
                    <!-- <img src="products/{{$product->image}}" class="rounded-circle" height="50" width="50" /> -->
                    <img src="{{ asset('products/' . $product->image) }}" class="rounded-circle" height="50" width="50" />
                </td>

                <td class="d-flex justify-content-end">
                    <button class="btn btn-primary m-1" Action="products/show">View</button>
                    <button class="btn btn-warning m-1"> <a href="products/{{$product->id}}/edit">Edit</a>
                    </button>
                    <button class="btn btn-danger m-1" Action="products/{{$product->id}}">Delete</button>
                </td>
            </tbody>
        @endforeach
    </table>
</div>
@endsection