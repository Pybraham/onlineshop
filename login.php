<?php 

// Handle form submission for user login
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 

    // Connect to the database 
    $host = "localhost"; 
    $dbname = "shop"; 
    $username_db = "root"; //default MySQL username in XAMPP/MAMP
    $password_db = "root"; 

    try { 
        $db = new PDO( 
            "mysql:host=$host;dbname=$dbname", 
            $username_db, 
            $password_db
        ); 
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        // Check if the user exists in the database 
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username"); 
        $stmt->bindParam(":username", $username); 
        $stmt->execute(); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC); 

        if ($user) { 
            // Verify the password 
            if (password_verify($password, $user["password"])) { 
                // Set session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["user"] = $user; 

                // Redirect the user to the appropriate page after successful login
                if(isset($_SESSION["redirect_to_cart"]) && $_SESSION["redirect_to_cart"] === true){
                    // If the user was redirected to login page from cart, redirect them to cart.php
                    header("Location: cart.php");
                } else {
                    // Otherwise, redirect them to the home page or any other default page
                    header("Location: home.php");
                }
                exit;
            } else { 
                echo "<h2>Login Failed</h2>"; 
                echo "Invalid username or password."; 
            } 
        } else { 
            echo "<h2>Login Failed</h2>"; 
            echo "User doesn't exist"; 
        } 
    } catch (PDOException $e) { 
        echo "Connection failed: " . $e->getMessage(); 
    } 
} 
?>
