@extends('layout')

@section('content')
<div class="container mt-4">
  <h1>Product List</h1>

  <!-- Search Form -->
  <form action="{{ route('products.index') }}" method="GET" class="mb-4">
    <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="Search by ID, Name, or Price"
        value="{{ request('search') }}">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Product ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($products as $product)
      <tr>
      <td>{{ $product->id }}</td>
      <td>{{ $product->product_id }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->description }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->stock }}</td>
      <td>
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50">
      </td>
      <td>{{ $product->created_at }}</td>
      <td>
        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"
          onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </td>
      </tr>
    @empty
      <tr>
      <td colspan="9" class="text-center">No products found.</td>
      </tr>
    @endforelse
    </tbody>
  </table>

  <!-- Pagination Links -->
  <div class="d-flex justify-content-center">
    {{ $products->links() }}
  </div>
</div>
@endsection