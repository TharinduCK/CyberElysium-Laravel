<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>

    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        @include('layouts.admin.admin-navbar')

        <div class="row">
            <div class="col-8 offset-2">
                <h4>Add Product</h4>
                <form action="{{ url('update-product/' . $product->id) }}" method="POST" enctype="multipart/form-data"
                    class="mb-4">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="product_name"
                                value="{{ $product->product_name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="product_price"
                                value="{{ $product->product_price }}">
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" {{ $product->status == 1 ? 'checked' : '' }}
                                    type="checkbox" name="status" checked>

                            </div>

                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Product Image</label>
                        @if ($product->image)
                            <div class="col-4">
                                <img src="{{ asset('assets/images/' . $product->image) }}">
                            </div>
                        @endif

                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <a href="/dashboard" class="btn btn-dark">Back</a>
                </form>
            </div>
        </div>

    </div>
</body>

</html>
