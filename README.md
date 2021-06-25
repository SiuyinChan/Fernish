# Fernish
Fernish is an experimental furniture e-commerce website that aims to demonstrate the possibility of building a fully featured web application natively, without relying on any framework.

## Quick Look
| ![Home Page](./screenshots/home.png?raw=true) | 
|:---------------------------------------------:| 
|                  *Home Page*                  |


| ![Admin Panel](./screenshots/admin.png?raw=true) | 
|:------------------------------------------------:| 
|                  *Admin Panel*                   |


## Features
- Browse and search a wide range of furniture products.
- Filter products by category, price range, and other attributes.
- View detailed product information, including images and descriptions.
- Secure user authentication and registration.
- Responsive design.
- Admin panel to manage users and products.

## Technologies Used
- PHP Native
- MySQL
- HTML / Sass
- JavaScript

## Getting Started with MAMP
To get started with Fernish on your local machine, follow the steps below.

### Installation
1. Install MAMP: Download and install MAMP from the official website (https://www.mamp.info/). MAMP provides a complete web development environment with Apache, MySQL, and PHP for macOS and Windows.
2. Move all files inside this repository into the `htdocs` directory of your MAMP installation.

### Database Setup
1. Create a MySQL database named `fernish`.
2. Import the provided SQL file `migration/database.sql` into your newly created database. This file contains the necessary table structures and sample data.
3. Open the `config/connect_db.php` file and update the database connection details to match your MAMP configuration.

### Usage
Open your web browser and navigate to http://localhost:8888 (or the appropriate port number) to access the Fernish website.

### Admin Panel
To access the admin panel and manage users and products, follow these steps:

1. Log in using your admin credentials. (`Username: admin, Password: admin`)
2. Once logged in, you will have access to the admin dashboard, where you can:
- Add, edit, or remove users.
- Add, edit, or remove products from the inventory.
- Manage product categories, prices, and other attributes.

