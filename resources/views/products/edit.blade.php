<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="form-container">
            <!-- Form Header -->
            <div class="form-header">
                <h1 class="h4 text-primary">Edit Product</h1>
            </div>

            <!-- Form -->
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Product Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Product Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        value="<?= htmlspecialchars($product->product) ?>" 
                        placeholder="Enter product name"
                        required>
                </div>

                <!-- Product Price -->
                <div class="form-group">
                    <label for="price" class="form-label">Price (₱)</label>
                    <input 
                        type="number" 
                        name="price" 
                        class="form-control" 
                        value="<?= htmlspecialchars($product->price) ?>" 
                        placeholder="Enter product price"
                        step="0.01" 
                        min="0" 
                        required>
                </div>

                <!-- Product Image -->
                <div class="form-group">
                    <label for="image" class="form-label">Update Product Image</label>
                    <input 
                        type="file" 
                        name="image" 
                        class="form-control-file"
                        accept="image/*">
                    <small class="form-text text-muted">Leave empty if you don't want to update the image.</small>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
