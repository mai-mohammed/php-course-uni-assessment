-- Disable foreign key checks to avoid constraint issues during truncation
SET FOREIGN_KEY_CHECKS = 0;

-- Truncate each table to remove all rows and reset auto-increment counters
TRUNCATE TABLE Order_Items;
TRUNCATE TABLE Orders;
TRUNCATE TABLE Role_Permissions;
TRUNCATE TABLE Permissions;
TRUNCATE TABLE User_Roles;
TRUNCATE TABLE Roles;
TRUNCATE TABLE Users;
TRUNCATE TABLE Products;
TRUNCATE TABLE Categories;

-- Re-enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;



-- Insert Roles
INSERT INTO Roles (role_name)
VALUES ('Customer'),
    ('Admin');
-- Insert Permissions
INSERT INTO Permissions (permission_name, description)
VALUES ('product_view', 'Allows viewing of products'),
    ('product_edit', 'Allows editing of products'),
    ('product_delete', 'Allows deleting of products'),
    ('product_create', 'Allows creating new products');
-- Assigning permissions for Customer role
INSERT INTO Role_Permissions (role_id, permission_id)
VALUES (1, 1);
-- Customer role with product_view permission only
-- Assigning permissions for Admin role
INSERT INTO Role_Permissions (role_id, permission_id)
VALUES (2, 1),
    -- Admin role with product_view
    (2, 2),
    -- Admin role with product_edit
    (2, 3),
    -- Admin role with product_delete
    (2, 4);
-- Admin role with product_create
-- Insert Users
-- Insert two users: one customer and one admin
INSERT INTO Users (username, email, password_hash)
VALUES (
        'customer_user',
        'customer@example.com',
        'hashed_password_customer'
    ),
    (
        'admin_user',
        'admin@example.com',
        'hashed_password_admin'
    );
-- Link Users to Roles in User_Roles
-- Assuming User IDs: customer_user = 1, admin_user = 2
-- Assuming Role IDs: Customer = 1, Admin = 2
INSERT INTO User_Roles (user_id, role_id)
VALUES (1, 1),
    -- Assigning Customer role to customer_user
    (2, 2);
-- Assigning Admin role to admin_user
-- Start by inserting unique categories
INSERT INTO Categories (name)
VALUES ('Shirts'),
    ('Jeans'),
    ('Shoes');
-- Insert Products with corresponding category_id
INSERT INTO Products (
        name,
        description,
        image_url,
        price,
        category_id,
        initial_stock
    )
VALUES -- Shirts category (assuming Shirts has id = 1)
    (
        'Mens Patchwork Corduroy Long Sleeve Shirt Autumn',
        'Mens Patchwork Corduroy Long Sleeve Shirt Autumn Fashion Casual Daily Japanese High Quality Contrast Color Harajuku Shirt 2022',
        'https://ae01.alicdn.com/kf/Hbcb6946719884fb38c4a960643869dbdD/Men-s-Patchwork-Corduroy-Long-Sleeve-Shirt-Autumn-Fashion-Casual-Daily-Japanese-High-Quality-Contrast-Color.jpg_Q90.jpg_.webp',
        8.00,
        1,
        100
    ),
    (
        'Summer Cool Men Short-sleeved Shirt',
        'Summer Cool Men Short-sleeved Shirt Anti-wrinkle Solid Color Fashion office Casual Loose Button Pocket Shirt Male Clothing Top',
        'https://ae01.alicdn.com/kf/Sc04f2d30182146e4b2d1c0281bc6937cy/Summer-Cool-Men-Short-sleeved-Shirt-Anti-wrinkle-Solid-Color-Fashion-office-Casual-Loose-Button-Pocket.jpg_Q90.jpg_.webp',
        30.00,
        1,
        100
    ),
    (
        'Mens Scottish Jacobite Ghillie Kilt Shirt',
        'Mens Scottish Jacobite Ghillie Kilt Shirts Medieval Renaissance Pirate Costume Long Sleeve Lace Up Henley Shirt Men Camisas XXL',
        'https://ae01.alicdn.com/kf/Sd2c2d9a62e934c48bbab14d70aa47092O/Mens-Scottish-Jacobite-Ghillie-Kilt-Shirts-Medieval-Renaissance-Pirate-Costume-Long-Sleeve-Lace-Up-Henley-Shirt.jpg_Q90.jpg_.webp',
        30.00,
        1,
        100
    ),
    (
        'Hawaiian beach shirts short-sleeved casual shirt',
        'Hawaiian beach shirts Mens short-sleeved casual shirts Seaside vacation quick-drying clothes Loose floral tops',
        'https://cdni.llbean.net/is/image/wim/300454_243_41?hei=438&wid=380&qlt=40',
        30.00,
        1,
        100
    ),
    (
        'Traditional Fit Short-Sleeve',
        'We love that our polo is made of 100% organic cotton - without the premium price of other organic polos on the market. We make it using supersoft fabric with a bit of texture for great character.',
        'https://ae01.alicdn.com/kf/H818be6b5758a40c383f98f9a4e30b95bW/Hawaiian-beach-shirts-Men-s-short-sleeved-casual-shirts-Seaside-vacation-quick-drying-clothes-Loose-floral.jpg_Q90.jpg_.webp',
        30.00,
        1,
        100
    ),
    (
        'Harajuku Plaid Shirt Men Cotton Casual Shirt',
        'Harajuku Plaid Shirt Men Cotton Casual Shirts Male Long Sleeve Jacket Unisex Blouses Tops Loose Checkboard Coat Spring Autumn',
        'https://ae01.alicdn.com/kf/S54fd3dbf1f9d40d384aae452498f570fb/Harajuku-Plaid-Shirt-Men-Cotton-Casual-Shirts-Male-Long-Sleeve-Jacket-Unisex-Blouses-Tops-Loose-Checkboard.jpg_Q90.jpg_.webp',
        10.00,
        1,
        100
    ),
    (
        'Mens Premium Double L® Polo Banded',
        'We love that our polo is made of 100% organic cotton - without the premium price of other organic polos on the market. We make it using supersoft fabric with a bit of texture for great character.',
        'https://cdni.llbean.net/is/image/wim/224547_1176_41?hei=438&wid=380&qlt=40',
        30.00,
        1,
        100
    ),
    (
        'Mens Lakewashed® Organic Cotton Polo',
        'We love that our polo is made of 100% organic cotton - without the premium price of other organic polos on the market. We make it using supersoft fabric with a bit of texture for great character.',
        'https://cdni.llbean.net/is/image/wim/513650_32573_41?hei=438&wid=380&qlt=40',
        30.00,
        1,
        100
    ),
    -- Jeans category (assuming Jeans has id = 2)
    (
        'Mens Double L® Jeans',
        'Made from heavyweight cotton that exceeds industry standards for toughness, the Double L Jeans are the most durable pair of denim we have on our shelf.',
        'https://cdni.llbean.net/is/image/wim/250265_0_44?hei=1370&wid=1190',
        90.00,
        2,
        100
    ),
    (
        'Flannel-Lined Classic Fit',
        'Made from heavyweight cotton that exceeds industry standards for toughness, the Double L Jeans are the most durable pair of denim we have on our shelf. First',
        'https://cdni.llbean.net/is/image/wim/100220_0_44?hei=1370&wid=1190',
        30.00,
        2,
        100
    ),
    (
        'Mens Double L® Jeans, Natural Fit',
        'Made from heavyweight cotton that exceeds industry standards for toughness, the Double L Jeans are the most durable pair of denim we have on our shelf. First',
        'https://cdni.llbean.net/is/image/wim/104731_0_44?hei=1370&wid=1190',
        30.00,
        2,
        100
    ),
    -- Shoes category (assuming Shoes has id = 3)
    (
        'Womens L.L.Bean Boots',
        'Discover the broken-in comfort of our BeanBuilt collection. These rugged styles don’t mind a little mud, rain or dirt—instead, they get even better with age. Whether you’re hauling brush or grabbing breakfast, they’re made for real life in every way.',
        'https://cdni.llbean.net/is/image/wim/514176_33404_41?hei=438&wid=380&qlt=40',
        70.00,
        3,
        100
    ),
    (
        'Mens Bean Boots, Gumshoes',
        'Discover the broken-in comfort of our BeanBuilt collection. These rugged styles don’t mind a little mud, rain or dirt—instead, they get even better with age. Whether you’re hauling brush or grabbing breakfast, they’re made for real life in every way.',
        'https://cdni.llbean.net/is/image/wim/515262_36370_41?hei=438&wid=380&qlt=40',
        30.00,
        3,
        100
    ),
    (
        'Womens L.L.Bean Boots',
        'Made from heavyweight cotton that exceeds industry standards for toughness, the Double L Jeans are the most durable pair of denim we have on our shelf. First',
        'https://cdni.llbean.net/is/image/wim/175066_50509_41?hei=438&wid=380&qlt=40',
        30.00,
        3,
        100
    );