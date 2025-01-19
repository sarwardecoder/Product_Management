@extends('products.layout')

@section('content')
<h1>Product Details</h1>

<p><strong>Product ID:</strong> {{ $product->product_id }}</p>
<p><strong>Name:</strong> {{ $product->name }}</p>
<p><strong>Description:</strong> {{ $product->description }}</p>
<p><strong>Price:</strong> {{ $product->price }}</p>
<p><strong>Stock:</strong> {{ $product->stock }}</p>
@if ($product->image)
    <p><strong>Image:</strong></p>
    <img src="{{ asset('storage/' . $product->image) }}" width="200">
    <!-- <img src="/storage/products/{{  $product->image }}" width="200"> -->

@endif

<a href="{{ route('products.index') }}">Back to Products</a>
@endsection