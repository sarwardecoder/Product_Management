<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
   

    <div class="container">

        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand">Product Management</a>
                    <ul class="navbar nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link ms-5">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/products/create" class="nav-link">Add Product</a>

                        </li>

                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </nav>


        @yield('content')


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>