const popup = $('.product-details-popup');
const overlay = $('.overlay');

function viewProductDetails(product) {
    popup.empty();
    const closePopup = $("<i class='fa-regular fa-xmark'></i>")
        .bind('click', () => {
            popup.removeClass('active');
            overlay.removeClass('active');
        });
    const productImage = $("<div class='product-image'></div>").css({ backgroundImage: `url(${product.image})` });
    const productDetails = $(`<section class="product-details">
        <div class= "product-name" >${product.name}</div >
        <div class="product-description">${product.description}</div>
        <div class="product-price">Price: $${product.price}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Category: ${product.category}</div>
        <button>Add To Cart</button>
        </section > `);

    popup.append(closePopup, productImage, productDetails);

}
