<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = ''; //i use MAMP server but you can use also XAMP
    $DATABASE_NAME = 'cart';
    
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        // Display error message
        echo 'Connection failed: ' . $exception->getMessage();
        // Stop script execution
        die();
    }
}
?>

// Template header, feel free to customize this
function template_header($title) {
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
                    <h1>Shopping Cart System</h1>
                    <nav>
                        <a href="index.php">Home</a>
                        <a href="index.php?page=products">Products</a>
                    </nav>
                    <div class="link-icons">
                        <a href="index.php?page=cart">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </header>
            <main>
HTML;
}

