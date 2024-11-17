<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Styling for Product Image */
        .product-image {
            width: 100%;
            max-width: 500px;
            height: auto;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        /* Action Button Styling */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        /* Center Alignment */
        .center-content {
            text-align: center;
        }

        /* Page Styling */
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <!-- Product Image Section -->
        <div class="center-content">
            <img src="storage/<?= htmlspecialchars($product->image) ?>" alt="No Image Available" class="product-image">
        </div>

        <!-- Product Name and Price -->
        <div class="center-content mt-4">
            <h2 class="font-weight-bold"><?= htmlspecialchars($product->product) ?></h2>
            <p class="text-muted">₱ <?= htmlspecialchars(number_format($product->price, 2)) ?></p>
        </div>

        <!-- Back to List Button -->
        <div class="center-content mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
        </div>

        <!-- Edit/Delete Buttons -->
        <div class="action-buttons">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-lg">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="m-0">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger btn-lg">Delete</button>
            </form>
        </div>
    </div>
</body>
</html>
