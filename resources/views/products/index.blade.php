@extends('products.layout')

@section('content')
<h1 padding="10px" class="mt-3">Products</h1>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="5" padding="10px" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th class="p-3 border border-gray">Name

            </th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td><img src="{{ asset('storage/' . $product->image) }}" width="50"></td>
                <td>
                    <a href="{{ route('products.show', $product) }}">View</a>
                    <a href="{{ route('products.edit', $product) }}">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection