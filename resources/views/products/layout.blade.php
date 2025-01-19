<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <style>
        input {
            padding: 5px;
            margin: 5px;
        }

        button {
            padding: 5px;
            border: 5px royalblue;
            border-radius: 5px 10px;
            gap: 5%;

        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12 d-flex justify-items-start">
                <a href="{{ route('products.index') }}">
                    <button class="btn btn-primary mt-5 p-4">Home</button>
                </a>
                <a href="{{ route('products.create') }}">
                    <button class="btn btn-warning mt-5 p-4">Add Product</button>
                </a>
            </div>
        </div>


        <div class="container mt-10 justify-content-center">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>