<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="mb-3">➕ Tambah Produk</h3>

            <form action="/produk" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>

                <button class="btn btn-primary">
                    Simpan
                </button>

                <a href="/produk" class="btn btn-secondary">
                    Kembali
                </a>
            </form>

        </div>
    </div>

</div>

</body>
</html>