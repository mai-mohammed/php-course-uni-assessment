# OnlineStore Project

## Project Overview
The **OnlineStore** project is an e-commerce web application created as a university assignment. It features a frontend built with HTML, CSS, and JavaScript, and a backend developed with PHP and MySQL. The application uses the Model-View-Controller (MVC) design pattern to organize code for scalability and maintainability. The store allows users to view products by category, register and log in, and make purchases.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP, MySQL

## Folder Structure

The project is organized into the following directory structure:

```
OnlineStore/
├── public/                         # Publicly accessible files (Document Root for Apache)
│   ├── css/                        # CSS stylesheets
│   ├── js/                         # JavaScript files
│   ├── images/                     # Static images
│   └── index.php                   # Main entry point for the application
├── app/                            # Application core (MVC pattern)
│   ├── Controllers/                # Controllers handling HTTP requests
│   ├── Models/                     # Models for database interactions
│   └── Views/                      # Views/templates for generating HTML
│       ├── templates/              # Shared templates (e.g., header, footer)
├── config/                         # Configuration files
│   ├── config.php                  # General app configuration
│   └── database.php                # Database connection settings
├── core/                           # Core framework components
│   ├── Router.php                  # Router for handling routes
│   ├── Database.php                # Database connection singleton
│   ├── Auth.php                    # Authentication handling (e.g., sessions)
│   └── Controller.php              # Base controller class for shared functionality
├── database/                       # SQL scripts for database management
│   ├── schema.sql                  # SQL script for database schema
│   └── seed.sql                    # Sample data for testing the application
├── docs/                           # Project documentation
│   └── README.md                   # Main README file
├── vendor/                         # Third-party libraries (managed by Composer)
├── composer.json                   # Composer configuration file
├── .gitignore                      # Git ignore rules
└── .env                            # Environment variables (e.g., database credentials)
```

### Explanation of Each Folder

- **public/**:
  - Contains all publicly accessible files, as this is set as the document root in Apache.
  - **css/**, **js/**, and **images/** directories hold the static assets used in the frontend.
  - Files like `index.php` (homepage), `login.php` (login page), and `product.php` (product details) are PHP files accessible to the user.

- **app/**:
  - **controllers/**: Contains PHP files that handle business logic, processing requests, and directing data between models and views.
  - **models/**: Manages interactions with the database, executing queries, and performing CRUD operations.
  - **views/**: Stores HTML templates mixed with PHP for rendering dynamic content. These are loaded by controllers to produce pages the user sees.

- **config/**:
  - Holds configuration files, primarily `config.php` which stores database connection settings.

- **database/**:
  - Contains SQL scripts, including `schema.sql` for creating the database schema and tables.

- **docs/**:
  - Documentation files, including this `README.md`.

- **vendor/**:
  - Stores third-party libraries if Composer is used for managing PHP dependencies.

## Database Schema

The database schema is designed to manage users, roles, products, categories, permissions, and orders. Here’s a description of each table:

1. **Categories**
   - Stores product categories (e.g., Shirts, Jeans, Shoes).
   - Fields:
     - `id` (Primary Key): Unique identifier for each category.
     - `name`: Category name.
     - `created_at`: Date of creation.
     - `updated_at`: Last update timestamp.

2. **Products**
   - Stores product information.
   - Fields:
     - `id` (Primary Key): Unique identifier for each product.
     - `name`: Product name.
     - `description`: Product description.
     - `image_url`: URL to the product image.
     - `price`: Product price.
     - `category_id` (Foreign Key): Links to `Categories`.
     - `initial_stock`: Starting stock quantity.
     - `created_at`: Date of creation.
     - `updated_at`: Last update timestamp.

3. **Users**
   - Manages user account information.
   - Fields:
     - `id` (Primary Key): Unique identifier for each user.
     - `username`: Username for login.
     - `email`: User email.
     - `password_hash`: Hashed password for security.
     - `created_at`: Account creation date.
     - `updated_at`: Last update timestamp.

4. **Roles**
   - Defines user roles, such as "Customer" or "Admin".
   - Fields:
     - `id` (Primary Key): Unique identifier for each role.
     - `role_name`: Name of the role.
     - `created_at`: Date of creation.
     - `updated_at`: Last update timestamp.

5. **User_Roles**
   - Many-to-many relationship linking `Users` to `Roles`.
   - Fields:
     - `user_id` (Foreign Key): Links to `Users`.
     - `role_id` (Foreign Key): Links to `Roles`.
     - Together, `user_id` and `role_id` form a composite primary key.

6. **Permissions**
   - Defines specific actions or access rights that can be assigned to roles, such as "product_view" or "product_edit".
   - Fields:
     - `id` (Primary Key): Unique identifier for each permission.
     - `permission_name`: Name of the permission (e.g., "product_view").
     - `description`: Brief description of what the permission allows.
     - `created_at`: Date of creation.
     - `updated_at`: Last update timestamp.

7. **Role_Permissions**
   - Many-to-many relationship linking `Roles` to `Permissions`, defining which permissions are assigned to each role.
   - Fields:
     - `role_id` (Foreign Key): Links to `Roles`.
     - `permission_id` (Foreign Key): Links to `Permissions`.
     - Together, `role_id` and `permission_id` form a composite primary key.

8. **Orders**
   - Stores order details for purchases made by users.
   - Fields:
     - `id` (Primary Key): Unique identifier for each order.
     - `user_id` (Foreign Key): Links to `Users` who placed the order.
     - `order_date`: Date the order was placed.
     - `status`: Status of the order (e.g., "Pending", "Shipped").
     - `total_amount`: Total cost of the order.
     - `created_at`: Date of creation.
     - `updated_at`: Last update timestamp.

9. **Order_Items**
   - Tracks individual items within an order, allowing multiple products per order.
   - Fields:
     - `id` (Primary Key): Unique identifier for each item within an order.
     - `order_id` (Foreign Key): Links to `Orders`.
     - `product_id` (Foreign Key): Links to `Products`.
     - `quantity`: Quantity of the product ordered.
     - `price_at_purchase`: Price of the product at the time of purchase.
     - `created_at`: Date of creation.
     - `updated_at`: Last update timestamp.

### Summary of Relationships

- **Products** are categorized under **Categories** via the `category_id` foreign key.
- **Users** can have multiple **Roles** through the `User_Roles` table, creating a many-to-many relationship.
- **Roles** can have multiple **Permissions** through the `Role_Permissions` table, enabling flexible access control.
- **Orders** are associated with **Users**, and each **Order_Items** entry links a **Product** to an **Order**, allowing detailed tracking of each item within an order.


## Setup and Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/OnlineStore.git
   cd OnlineStore
   ```

2. **Database Setup**:
   - Create a new MySQL database.
   - Run the `schema.sql` script located in the `database/` folder to create the tables.
   - Update the database configuration in `config/config.php`.

3. **Install Dependencies** (if using Composer):
   ```bash
   composer install
   ```

4. **Start Apache Server**:
   - Place the project in your Apache server's root directory.
   - Ensure the document root points to the `public/` folder.
   - Access the application via `http://localhost/OnlineStore`.

5. **Accessing the Application**:
   - Visit `http://localhost/OnlineStore/public/index.php` to view the homepage.

## Usage

- **Homepage**: Lists products and allows users to browse categories.
- **Login**: Allows registered users to log in. After login, users can place orders.
- **Product Details**: Provides detailed information about each product.
- **Admin Access**: (If implemented) Allows admins to manage products, categories, and orders.



Here's the updated `README.md` section for the database schema, with the additional tables for **Permissions** and **Role_Permissions**:

---

