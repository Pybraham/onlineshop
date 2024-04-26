# Online shops/E commerce with PHP,HTML and Javascript 
            1.Clothstore with PHP,HTML
            2.Burgerhaus with HTML ,Javascript
            3. ...
            
# 1. Toy onlineshop
Das Online-Shop-Projekt unterscheidet zwischen zwei Benutzertypen: Kunden und Admin.
Der Administrator (Admin) verwaltet alle wichtigen Daten und Einträge der zu verkaufenden Produkte. Außerdem aktualisiert der Admin den Bestellstatus der Kunden.
Die Kunden (Abonnenten oder Käufer) können Produkte suchen, filtern und durchstöbern. Sie können ausgewählte Produkte in ihrem Warenkorb speichern, um sie später zu kaufen. 
Um zur Kasse gehen zu können, müssen sich Kunden im System registrieren. Bei der Bestellung geben sie ihre Lieferadresse an.
Dieses Online-Shop-System wickelt Bestellungen nur per Nachnahme ab und ist nicht an Drittanbieter wie Kreditkarten-APIs oder PayPal angeschlossen.  <br />
<h2>Steps</h2>  
1.create Database ,for example db_name : Shop  <br /> 

2.SQL__  INSERT INTO `products`(product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) VALUES<br />
('Gadgets','Toy','Baby Born Puppe Mädchen', 49.99, 'Baby Born Puppe Mädchen', './product_images/baby-born-puppe-maedchen.jpg','toys'),<br />
('Gadgets','Toy','Bagger mit Spielfigur', 29.99,'Bagger mit Spielfigur', './product_images/bagger-mit-spielfigur.jpg','toys'),<br />
('Gadgets','Toy','Barbie Prinzessin', 30, 'Barbie Prinzessin', './product_images/barbie-prinzessin.jpg','toys'),<br />
('Gadgets','Toy','Einhorn Malbuch', 15.99, 'Einhorn Malbuch', './product_images/einhorn-malbuch.jpg','toys'),<br />
('Gadgets','Toy','Frisierkopf mit Schminke', 44.99, 'Frisierkopf mit Schminke', './product_images/frisierkopf-mit-schminke-9-4-4.jpg','toys'), <br />
 
3.Create index.php, cart.php, login/out.php, Checkout<br />
![Image Alt Text](https://github.com/Pybraham/onlineshop/blob/main/login.png)
A registration is automatically saved in database,with hushed password,The cart calculates the order amount,greet by the user name here nika!
<br />
# Bonus🍬 
# I show here how to use the style css with awsome fonts and #discounts from the index.php(the whole codes privated)
                     
''' <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</head>
<body>
<h1> Welcome to  Toy onlineshop</h1>

<?php require_once("php/header.php"); ?>

<div class="container">
    <div class="row text-center py-5">
        <div class="col-md-3 col-sm-6 my-3 my-md-0">
            <form action="index.php" method="post">
                <div class="card shadow">
                    
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <h6> <i class="fas fa-star"></i> </h6>
                        <p class="card-text">Ein kurzer Beispieltext zum Aufbau der Karte.</p>
                        <h5>
                        <small><s class="text-secondary">49.99 $</s></small>
                          <span class="price">29.99 $</span>'''
#                            <small><s class="text-secondary">49.99 $</s></small>
#                            <span class="price">29.99 $</span>
                        ''' </h5>
                        <button type="submit" class="btn btn-warning my-3" name="add">In den Warenkorb <i class="fas fa-shopping-cart"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3 col-sm-6 my-3 my-md-0"></div>
        <div class="col-md-3 col-sm-6 my-3 my-md-0"></div>
    </div>
</div>

</body>
</html>  '''
<h2> Welcome to Burger king</h2>  '''

# 2. Burger house website
![Image Alt Text](https://github.com/Pybraham/onlineshop/blob/main/burgerhaus45.png)
# used JavaScript to modify the HTML content of the shoping cart icon
The addToCart() function increments the cartCount variable and 
then calls updateCartIcon() to update the cart icon in the header.
Assume you have alreday index.php/html,checkout.html/Php, services.html etc.<br /> 
<h1></h1> BUT no NEED creating cart.html/php!!! instead add the following javascript to the index.html</h1>

 ''' <script>
    let cartCount = 0;
    function addToCart(burgerName) {
      cartCount++;
      updateCartIcon();
      alert(burgerName + " added to cart!");
    }
  
    function updateCartIcon() {
      const cartCountElement = document.getElementById('cartCount');
      cartCountElement.textContent = cartCount;
    }
  </script> '''

![Image Alt Text](https://github.com/Pybraham/onlineshop/blob/main/burgercheckout.png)<br />
The togglePaymentFields() function is called when the user changes the payment type.
It shows or hides the bank or PayPal fields accordingly.<br />
''' <script>
    function togglePaymentFields() {
      const paymentType = document.getElementById('paymentType').value;
      const bankFields = document.getElementById('bankFields');
      const paypalFields = document.getElementById('paypalFields');

      if (paymentType === 'bank') {
        bankFields.style.display = 'block';
        paypalFields.style.display = 'none';
      } else if (paymentType === 'paypal') {
        bankFields.style.display = 'none';
        paypalFields.style.display = 'block';
      }
    }

    function submitForm(event) {
      event.preventDefault(); // Prevent default form submission
      const formData = new FormData(document.getElementById('checkoutForm'));
      const formObject = {};
      formData.forEach((value, key) => formObject[key] = value);
      console.log(formObject); // Log form data

      // Display the alert message
      alert("Thanks for your order! You have to cook it yourself. We will provide you with the ingredients!");
    }
  </script> '''
  ![Image Alt Text](https://github.com/Pybraham/onlineshop/blob/main/order.png)
