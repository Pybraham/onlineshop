<?php
// Function to establish a PDO MySQL connection if not already defined
if (!function_exists('pdo_connect_mysql')) {
    function pdo_connect_mysql() {
        // Update the details below with your MySQL connection details
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = 'root';
        $DATABASE_NAME = 'shop';
        
        try {
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }
    }
}

// Function to start a session if not already started
if (!function_exists('start_session')) {
    function start_session() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}

// Template header function
function template_header($title) {
    // Start the session if not already started
    start_session();
    
    // Get the number of items in the shopping cart
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    
    // Output the HTML for the header
    echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>$title</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
    <header>
        <div class="content-wrapper">
            <h1>XYZ Toy Online shop</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="index.php?page=products">Products</a>
                
            </nav>
            <div class="link-icons">
                <a href="index.php?page=cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span>$num_items_in_cart</span>
                </a>
            </div>
        </div>
    </header>
    <main>
HTML;
}

// Template footer function
function template_footer() {
    // Output the HTML for the footer
    echo <<<HTML
    </main>
    <footer>
        <div class="content-wrapper">
            <p>&copy; <?php echo date('Y'); ?> XYZ Toy onlineshop powerd by @Abraham</p>
        </div>
    </footer>
</body>
</html>
HTML;
}

// Function to add a product to the cart
function addToCart($product_id, $quantity) {
    // Start the session if not already started
    start_session();
    
    // Check if the cart session variable exists
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Add the product to the cart or update the quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

// Function to remove a product from the cart
function removeFromCart($product_id) {
    // Start the session if not already started
    start_session();
    
    // Check if the product exists in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // Remove the product from the cart
        unset($_SESSION['cart'][$product_id]);
    }
}

// Function to update the quantity of a product in the cart
function updateCart($cart_data) {
    // Start the session if not already started
    start_session();
    
    // Loop through the cart data
    foreach ($cart_data as $product_id => $quantity) {
        // Check if the quantity is valid
        if (is_numeric($quantity) && $quantity > 0) {
            // Update the quantity of the product in the cart
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }
}

// Function to get products in the cart
function getProductsInCart() {
    // Start the session if not already started
    start_session();
    
    // Return the products in the cart if it exists, otherwise return an empty array
    return isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
}
// Function to fetch product details from the database based on the product ID
function getProductDetailsFromDatabase($product_id) {
    // Connect to the database
    $pdo = pdo_connect_mysql();

    // Prepare the SQL statement to fetch product details
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$product_id]);

    // Fetch the product details as an associative array
    $product_details = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the product details
    return $product_details;
}

// Function to calculate the subtotal of products in the cart
function calculateSubtotal() {
    // Start the session if not already started
    start_session();
    
    // Initialize the subtotal
    $subtotal = 0.0;
    
    // Get the products in the cart
    $products_in_cart = getProductsInCart();
    
    // Loop through the products in the cart and calculate the subtotal
    foreach ($products_in_cart as $product_id => $quantity) {
        // Fetch the product details from the database (replace this with your own logic)
        $product_price = 10.00; // Example product price (replace with your own logic)
        
        // Calculate the subtotal for this product and add it to the total
        $subtotal += $product_price * $quantity;
    }
    
    return $subtotal;
}
?>
