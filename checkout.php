<!DOCTYPE html> 
<html> 


<body> 
	<header> 
		<nav> 
			<ul> 
				<li> 
					<a href="shop.php">Home</a> 
				</li> 
				<li> 
					<a href="shop.php">Shop</a> 
				</li> 
				<li> 
					<a href="cart.php">Cart</a> 
				</li> 
				<li> 
					<a href= 
"mailto:abrahtay@gmail.com">Contact</a> 
				
					</li> 
			</ul> 
		</nav> 
	</header> 

	<section> 
		<h1>Checkout</h1> 
		<form action="placeorder.php" method="post"> 
			<h2>Billing Information</h2> 
			<label for="name">Name:</label> 
			<input type="text"
				id="name"
				name="name" required> 

			<label for="email">Email:</label> 
			<input type="email"
				id="email"
				name="email" required> 

			<label for="address">Address:</label> 
			<input type="text"
				id="address"
				name="address" required> 

			<label for="city">City:</label> 
			<input type="text"
				id="city"
				name="city" required> 

			<label for="state">State:</label> 
			<input type="text"
				id="state"
				name="state" required> 

			<label for="zip">Zip Code:</label> 
			<input type="text"
				id="zip"
				name="zip" required> 

			<h2>Payment Information</h2> 
			<label for="cardholder">Name on Card:</label> 
			<input type="text" id="cardholder"
				name="cardholder" required> 

			<label for="cardnumber">Card Number:</label> 
			<input type="text"
				id="cardnumber"
				name="cardnumber" required 
				pattern="\d{4}-?\d{4}-?\d{4}-?\d{4}" required=> 


			<label for="expmonth">Expiration Month:</label> 
			<input type="text"
				id="expmonth"
				name="expmonth" required> 

			<label for="expyear">Expiration Year:</label> 
			<input type="text"
				id="expyear"
				name="expyear" required> 

			<label for="cvv">CVV:</label> 
			<input type="text"
				id="cvv"
				name="cvv" required> 

			<input type="submit"
				value="Place Order"> 
		</form> 
	</section> 

	<footer> 
		<p>&copy; 2024 XYZ Toy Powerd by Abraham</p> 
	</footer> 
</body> 

</html>

//The code below is additional bank.php as another file
 <?php
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the form data
    $account_holder = isset($_POST['account_holder']) ? htmlspecialchars($_POST['account_holder']) : '';
    $account_number = isset($_POST['account_number']) ? htmlspecialchars($_POST['account_number']) : '';
    $routing_number = isset($_POST['routing_number']) ? htmlspecialchars($_POST['routing_number']) : '';

    // Process the bank payment
    // Here you would typically connect to a payment gateway or perform the required actions to process the payment

    // After processing, you might want to redirect the user to a thank you page
    header("Location: placeorder.php");
    exit();
} else {
    // If the form is not submitted via POST method, redirect the user back to the cart page
    header("Location: cart.php");
    exit();
}
?> //
