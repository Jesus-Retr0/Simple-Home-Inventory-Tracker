# Simple Home Inventory Tracker

A simple PHP & MySQL web application to help you manage and track your home inventory.

## Features

- Add, edit, and delete items in your inventory
- Organize items by category and location
- View all items in a sortable table
- Simple, clean interface

## Requirements

- PHP 7.x or newer
- MySQL or MariaDB
- Web server (e.g., Apache with XAMPP)

## Setup

1. **Clone or download this repository.**

2. **Create the database:**
   - Import the provided SQL file (if available) or create a database named `home-inventory` and a table named `items`:
     ```sql
     CREATE TABLE `items` (
       `id` INT AUTO_INCREMENT PRIMARY KEY,
       `name` VARCHAR(255) NOT NULL,
       `category` VARCHAR(255) NOT NULL,
       `quantity` INT NOT NULL,
       `location` VARCHAR(255) NOT NULL
     );
     ```

3. **Configure the database connection:**
   - Edit `config/db.php` with your MySQL credentials.

4. **Run the application:**
   - Place the project folder in your web server's root directory (e.g., `htdocs` for XAMPP).
   - Open your browser and go to `http://localhost/Simple-Home-Inventory-Tracker/public/index.php`

## File Structure

```
Simple-Home-Inventory-Tracker/
│
├── config/
│   ├── db.php
│   ├── delete_item.php
│   └── edit_item.php
├── public/
│   ├── index.php
│   ├── add_item.php
│   ├── inventory.php
├── src/
│   ├── add_item_style.css
│   └── inventory_style.css
│   └── styles.css
└── README.md
```

## License
This project is licensed under the [MIT License](LICENSE).
