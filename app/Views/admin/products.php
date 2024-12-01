<main>
    <nav class="breadcrumb">
        <a href="/">Home</a> &gt; <a href="/admin-panel">Admin Panel</a> &gt; <span>Products</span>
    </nav>

    <h1 class="section-header">Products</h1>
    <?php if (empty($products)): ?>
        <p>No products available.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Product Number</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['id']); ?></td>
                        <td><?= htmlspecialchars($product['name']); ?></td>
                        <td><img src="<?= htmlspecialchars($product['image_url']); ?>" alt="<?= htmlspecialchars($product['name']); ?>"></td>
                        <td><a href="/admin-panel/products/<?= htmlspecialchars($product['id']); ?>">View Details</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>