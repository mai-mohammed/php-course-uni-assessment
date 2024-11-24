document.addEventListener('DOMContentLoaded', () => {
    const popup = document.querySelector('.product-details-popup');
    const overlay = document.querySelector('.overlay');

    /**
     * Display product details in the popup
     * @param {HTMLElement} productElement - The clicked product element
     */
    function displayProductDetails(productElement) {
        // Extract product data from the clicked element's dataset
        const productData = {
            id: productElement.dataset.id,
            name: productElement.dataset.name,
            description: productElement.dataset.description,
            price: productElement.dataset.price,
            category: productElement.dataset.category,
            imageUrl: productElement.dataset.imageUrl,
        };

        // Populate popup with product details
        popup.innerHTML = `
            <i class="fa-regular fa-xmark close-popup"></i>
            <div class="product-image" style="background-image: url(${productData.imageUrl})"></div>
            <section class="product-details">
                <div class="product-name">${productData.name}</div>
                <div class="product-description">${productData.description}</div>
                <div class="product-price">
                    Price: $${productData.price} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Category: ${productData.category}
                </div>
                <button>Add To Cart</button>
            </section>
        `;

        // Add active class to display the popup and overlay
        popup.classList.add('active');
        overlay.classList.add('active');

        // Add event listener to close the popup
        document.querySelector('.close-popup').addEventListener('click', closePopup);
    }

    /**
     * Close the popup and overlay
     */
    function closePopup() {
        popup.classList.remove('active');
        overlay.classList.remove('active');
    }

    /**
     * Add click event listeners to all product cards
     */
    const products = document.querySelectorAll('.product');
    products.forEach(product => {
        product.addEventListener('click', () => displayProductDetails(product));
    });

    // Close popup when clicking the overlay
    overlay.addEventListener('click', closePopup);
});
