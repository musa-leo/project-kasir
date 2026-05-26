<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="mb-3">✏️ Edit Product</h3>

            <form action="/produk/{{ $product->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Product Name</label>
                    <input type="text" name="name"
                           value="{{ $product->name }}"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Price</label>
                    <input type="number" name="price"
                           value="{{ $product->price }}"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Stock</label>
                    <input type="number" name="stock"
                           value="{{ $product->stock }}"
                           class="form-control" required>
                </div>

                <button class="btn btn-warning">
                    Update
                </button>

                <a href="/produk" class="btn btn-secondary">
                    Back
                </a>
            </form>

        </div>
    </div>

</div>

</body>
</html>