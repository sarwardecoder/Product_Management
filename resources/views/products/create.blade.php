@extends('products.layout')
@section('content')
<h1>Add New Product</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Product ID:</label>
    <input type="text" name="product_id" required>
    <br>
    <label>Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Description:</label>
    <textarea name="description"></textarea>
    <br>
    <label>Price:</label>
    <input type="number" step="0.01" name="price" required>
    <br>
    <label>Stock:</label>
    <input type="number" name="stock">
    <br>
    <label>Image:</label>
    <input type="file" name="image" required>
    <br><br>
    <button type="submit">Save</button>
</form>
@endsection