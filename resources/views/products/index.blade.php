<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: contain;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
            transition: transform 0.3s ease;
        }
        .product-image:hover {
            transform: scale(1.05);
        }
        .table-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }
        .success-alert {
            font-size: 14px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .success-alert i {
            margin-right: 10px;
        }
        .product-name {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
            text-align: center;
        }
        .product-price {
            font-size: 14px;
            font-weight: 600;
            color: #007bff;
            text-align: center;
            margin-top: 5px;
        }
        .product-card {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5 p-4 bg-white shadow rounded">
        <!-- Page Title -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Products</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
        </div>

        <!-- Success Message -->
        <?php if (session('success')): ?>
            <div class="alert alert-success success-alert">
                <i class="fas fa-check-circle"></i>
                <?= htmlspecialchars(session('success')) ?>
            </div>
        <?php endif; ?>

        <!-- Product List -->
        <div class="container">
            <div class="row pt-5">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 col-sm-6 col-12 mb-4">
                        <div class="product-card">
                            <a href="{{ route('products.show', $product->id) }}">
                                <img src="storage/<?= htmlspecialchars($product->image) ?>" alt="Not available" class="product-image">
                            </a>
                            <div class="product-name"><?= htmlspecialchars($product->product) ?></div>
                            <div class="product-price">₱ <?= number_format($product->price, 2) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    
</body>
</html>
