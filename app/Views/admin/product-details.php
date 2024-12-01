<main>
    <nav class="breadcrumb">
        <a href="/">Home</a> &gt; <a href="/admin-panel">Admin Panel</a> &gt; <a href="/admin-panel/products">Products</a> &gt; <span>Product Details</span>
    </nav>

    <div class="product-details-container">
        <div class="product-image" style="background-image: url(<?= htmlspecialchars($product['image_url']); ?>)"></div>
        <section class="product-details">
            <div class="product-name"><?= htmlspecialchars($product['name']); ?></div>
            <div class="product-description"><?= htmlspecialchars($product['description']); ?></div>
            <div class="product-price">
                Price: <?= htmlspecialchars($product['price']); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Stock: <?= htmlspecialchars($product['initial_stock']); ?>
            </div>
        </section>
    </div>
</main>