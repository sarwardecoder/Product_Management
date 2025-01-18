@extends('products.layout')
@section('content')
<h1>Edit Product</h1>

<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>Product ID:</label>
    <input type="text" name="product_id" value="{{ $product->product_id }}" required>
    <br>
    <label>Name:</label>
    <input type="text" name="name" value="{{ $product->name }}" required>
    <br>
    <label>Description:</label>
    <textarea name="description">{{ $product->description }}</textarea>
    <br>
    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
    <br>
    <label>Stock:</label>
    <input type="number" name="stock" value="{{ $product->stock }}">
    <br>
    <label>Image:</label>
    <input type="file" name="image">
    @if ($product->image)
        <p>Current Image:</p>
        <img src="{{ asset('storage/' . $product->image) }}" width="100">
    @endif
    <br><br>
    <button type="submit">Update</button>
</form>
@endsection