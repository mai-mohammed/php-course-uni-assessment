<main>
    <div class="landing">
        <h1 class="category-label"><?= htmlspecialchars($title); ?></h1>
    </div>
    <div class="search">
        <form class="search-form">
            <div class="select-inputs-container">
                <select name="category" class="category-selector">
                    <option value="">Category</option>
                    <option value="Shirts">Shirts</option>
                    <option value="Jeans">Jeans</option>
                    <option value="Shoes">Shoes</option>
                </select>
                <select name="price" class="price-selector">
                    <option value="">Price</option>
                    <option value="5">$5</option>
                    <option value="10">$10</option>
                    <option value="20">$20</option>
                    <option value="50">$50</option>
                </select>
            </div>
            <div class="search-input-container">
                <input type="text" placeholder="Search..." class="txt-search">
            </div>
        </form>
    </div>
    <div class="products" id="products-container">
        <?php if (empty($products)): ?>
            <h1>There are no products!</h1>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div 
                    class="product" 
                    data-id="<?= htmlspecialchars($product['id']); ?>" 
                    data-name="<?= htmlspecialchars($product['name']); ?>" 
                    data-description="<?= htmlspecialchars($product['description']); ?>" 
                    data-price="<?= htmlspecialchars($product['price']); ?>" 
                    data-category="<?= htmlspecialchars($product['category']); ?>" 
                    data-image-url="<?= htmlspecialchars($product['image_url']); ?>"
                >
                    <img class="product-img" src="<?= htmlspecialchars($product['image_url']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
                    <div class="product-info">
                        <span class="name"><?= htmlspecialchars($product['name']); ?></span>
                        <span class="price">$ <?= htmlspecialchars($product['price']); ?></span>
                        <button class="add-to-cart-btn">
                            <i class="fa-light fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="product-details-popup"></div>
    <div class="overlay"></div>

    <script src="/js/products.js"></script>
</main>
