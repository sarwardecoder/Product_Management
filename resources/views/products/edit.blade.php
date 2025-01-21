@extends('products.layout')

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>

@endif
<div class="row justify-content-center">

    <div class="col-md-8 mt-5">
        <div class="card mt-3 p-3">
            <h1 class="text-warning">Edit product - {{$product->name}}</h1>
            <form action="/products/{{$product->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name', $product->name)}}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="description" class="form-control"
                        rows="3">{{old('description', $product->description)}}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger">{{$errors->first('description')}}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="decimal" name="price" class="form-control" value="{{old('price', $product->price)}}">
                    @if($errors->has('price'))
                        <span class="text-danger">{{$errors->first('price')}}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Stock</label>
                    <input type="numeric" name="stock" class="form-control" value="{{old('stock', $product->stock)}}">
                    @if($errors->has('stock'))
                        <span class="text-danger">{{$errors->first('stock')}}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" value="{{old('image', $product->image)}}">
                    @if($errors->has('image'))
                        <span class="text-danger">{{$errors->first('image')}}
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    Update Product
                </button>

            </form>
        </div>
    </div>
</div>

@endsection