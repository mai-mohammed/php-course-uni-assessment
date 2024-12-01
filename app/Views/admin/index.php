<main>
    <nav class="breadcrumb">
        <a href="/">Home</a> &gt; <span>Statistics</span>
    </nav>

    <h1 class="section-header">Statistics</h1>

    <section class="statistics-summary">
        <h2 class="summary-header">Summary</h2>
        <ul>
            <li>Total Products: <?= htmlspecialchars($statistics['total_products']); ?></li>
            <li>Total Categories: <?= htmlspecialchars($statistics['total_categories']); ?></li>
            <li>Total Orders: <?= htmlspecialchars($statistics['total_orders']); ?></li>
            <li>Total Revenue: $<?= htmlspecialchars(number_format($statistics['total_revenue'], 2)); ?></li>
        </ul>
    </section>

    <section class="top-products">
        <h2 class="top-products-header">Top Selling Products</h2>
        </br>
        <?php if (!empty($statistics['top_selling_products'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Total Sold</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($statistics['top_selling_products'] as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']); ?></td>
                            <td><?= htmlspecialchars($product['total_sold']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No sales data available.</p>
        <?php endif; ?>
    </section>

    <div class="cta-container">
        <a href="/admin-panel/products" class="cta-button">View Products</a>
    </div>
</main>