@extends('products.layout')
<!-- @include('products.homeBtnWithProduct') -->
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12 d-flex justify-items-start">
            <a href="{{ route('products.index') }}">
                <button class="btn btn-primary mt-5 p-4">Home</button>
            </a>
            <!-- <a href="{{ route('products.create') }}">
                <button class="btn btn-warning mt-5 p-4">Add Product</button>
            </a> -->
        </div>
    </div>
<div class="card mt-5">
    <h2 class="card-header">Add New Product</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
            </div>

            <div class="mb-3">
                <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
                <textarea class="form-control" style="height:150px" name="detail" id="inputDetail"
                    placeholder="Detail"></textarea>
            </div>

            <div class="mb-3">
                <label for="inputImage" class="form-label"><strong>Image:</strong></label>
                <input type="file" name="image" class="form-control" id="inputImage">
            </div>

            <div class="mb-3">
                <label for="inputPrice" class="form-label"><strong>Price:</strong></label>
                <input type="number" name="price" class="form-control" id="inputPrice" placeholder="Price">
            </div>

            <div class="mb-3">
                <label for="inputStock" class="form-label"><strong>Stock:</strong></label>
                <input type="number" name="stock" class="form-control" id="inputStock" placeholder="Stock">
            </div>

            <button class="btn btn-warning mt-5 p-4">Add this Product Now</button>
        </form>

    </div>
</div>
@endsection