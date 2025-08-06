🦆 Ducks Store (October 2015)
A vintage PHP/MySQL e-commerce site for selling rubber ducks.

🛠 Installation Instructions
1. Clone the Repository
Download the repository to your local machine:

bash
git clone https://github.com/AndrewDonnelly93/ducks-store.git

2. Set Up a Local Web Server
Install a local web server stack such as XAMPP.

3. Set Up MySQL Access
Use either:

Valentina Studio: Download

phpMyAdmin: Included with XAMPP. You can launch it via the Admin button next to Apache in the XAMPP control panel.

4. Create the Database
Open your SQL client (e.g., phpMyAdmin).

Create a new database named:

nginx
duck_store
Import the ducks.sql dump file located in the root of the repository.

5. Configure Local Hosts (Windows Example)
a) Update your hosts file:
Edit this file:

makefile
Copy
Edit
C:\Windows\System32\drivers\etc\hosts
Add the following line:

lua
Copy
Edit
127.0.0.1   ducks-store.local
b) Update Apache Virtual Hosts
Open:

Copy
Edit
XAMPP\apache\conf\extra\httpd-vhosts.conf
Add the following:

apache
Copy
Edit
NameVirtualHost *:80

<VirtualHost *:80>
    DocumentRoot "D:/XAMPP/htdocs/ducks-store/web"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin webmaster@ducks-store.local
    DocumentRoot "D:/XAMPP/htdocs/ducks-store/web"
    ServerName ducks-store.local
    ServerAlias www.ducks-store.local
    ErrorLog "D:/XAMPP/htdocs/ducks-store/logs/error.log"
    CustomLog "D:/XAMPP/htdocs/ducks-store/logs/access.log" combined

    <Directory "D:/XAMPP/htdocs/ducks-store/web">
        Require all granted
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
⚠️ Replace D:/XAMPP/htdocs/ducks-store with the actual path to where you cloned the project.

6. Launch the Site
Visit:

arduino
Copy
Edit
http://ducks-store.local
in your browser to open the store.

🛍 Client Features
Homepage displays the 6 most recently added ducks

Each duck image links to its individual product page

Use the "Catalog" tab or sidebar search by category to browse items

Products can be added to the cart from both the catalog and product pages (max quantity: 99)

After adding to the cart, the user is returned to the previous page (if $_SERVER['HTTP_REFERER'] is supported), or the homepage

Cart page allows:

Updating quantity

Removing individual items

Clearing the entire cart

Proceeding to checkout

🧾 Checkout Form
Fields: Full name, address, and email (required)

Optional: Add a note to the order

🔐 Admin Panel
Access the admin panel at:

pgsql
Copy
Edit
http://ducks-store.local/admin
Login credentials:

makefile
Copy
Edit
Username: admin
Password: 123
🧱 Product Management
View table of all products

Each product has options to edit or delete

Editing a Product
Update name, price, description, category

Upload image files (gif, png, jpg, jpeg)

Redirects back to the edit page after submission

Deleting a Product
Product is removed from the database

Redirects to the product listing page

Adding New Products
Similar form as editing

Redirects to edit page after submission

🗂 Category Management
Edit, add, or delete product categories

When a category is deleted:

It is removed from all associated products

Those products are marked as "Unspecified"

📦 Order Management
Orders page shows a table of all orders

Columns: Order ID and creation date

Clicking an order shows full details:

Customer contact info

List of ordered products

