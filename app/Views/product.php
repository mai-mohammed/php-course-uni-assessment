<main>
    <h1><?= htmlspecialchars($product['name']); ?></h1>
    <div class="product-details">
        <div class="product-image">
            <img src="/images/<?= htmlspecialchars($product['image_url']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
        </div>
        <div class="product-info">
            <h2><?= htmlspecialchars($product['name']); ?></h2>
            <p><?= htmlspecialchars($product['description']); ?></p>
            <p>Price: $<?= htmlspecialchars($product['price']); ?></p>
            <p>Category: <?= htmlspecialchars($product['category']); ?></p>
            <button>Add to Cart</button>
        </div>
    </div>
</main>
