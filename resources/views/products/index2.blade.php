@extends('products.layout')
@include('products.homeBtnWithProduct')

@extends('products.layout')

@section('content')
<div class="card mt-5">
    <h2 class="card-header text-center">Product Manage at glance</h2>
    <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="mb-3">
            <input type="text" id="search" class="form-control" placeholder="Search products...">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Create
                New Product</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Image</th>
                    <th>
                        <a
                            href="{{ route('products.index', ['sortBy' => 'name', 'sort' => request('sort') == 'asc' ? 'desc' : 'asc']) }}">
                            Name
                            <i
                                class="fa {{ request('sortBy') == 'name' && request('sort') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                        </a>
                    </th>
                    <th>
                        <a
                            href="{{ route('products.index', ['sortBy' => 'detail', 'sort' => request('sort') == 'asc' ? 'desc' : 'asc']) }}">
                            Details
                            <i
                                class="fa {{ request('sortBy') == 'detail' && request('sort') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                        </a>
                    </th>
                    <th width="250px">Action</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/images/{{ $product->image }}" width="100px"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}"><i
                                        class="fa-solid fa-list"></i> Show</a>

                                <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i> Edit</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                    Delete</button>

                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>

        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    // you can also use keyup 
    $(document).ready(function () {
        $('#search').on('input', function () {

            let query = $(this).val();

            $.ajax({
                url: "{{ route('products.search') }}",
                type: 'GET',
                data: { 'query': query },
                success: function (data) {
                    $('tbody').html(data);
                },
                error: function () {
                    alert('Search failed. Please try again.');
                }
            });

        });
    });
</script>


@endsection