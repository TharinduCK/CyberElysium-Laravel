<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body>
    <div class="container-fluid">
        @include('layouts.admin.admin-navbar')

        <a href="/add_product" class="btn btn-dark offset-1 mt-2 mb-2">Add Product</a>

        <div class="row">

            <div class="col-10 offset-1 mt-2">
                <table class="table text-center col-12 align-middle">
                    <tr class="table-primary">
                        <th class="">Product ID</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Status</th>
                        <th>Change Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td><img src="{{ asset('assets/images/' . $item->image) }}" alt="Image Here" width="100">
                        </td>
                        <td>{{ $item->product_price }}</td>
                        <td>
                            @if ($item->status == 1)
                                Active
                            @else
                                Deactive
                            @endif
                        </td>

                        <td><a href="{{ url('product-status/' . $item->id) }}" class="btn btn-info col-10">Change</a>
                        </td>
                        <td>
                            <a href="{{ url('edit-product/' . $item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete-product/' . $item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                </table>
            </div>

        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
