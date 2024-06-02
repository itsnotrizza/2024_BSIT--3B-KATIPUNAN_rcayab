<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katipunan_menu</title>
    <style>
        body {
            background-color: #f6f2e8; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }

        h2 {
            color: black; 
            text-align: center;
        }

        .category {
            margin-bottom: 30px;
        }

        .category h3 {
            color: black; 
            margin-bottom: 10px;
        }

        .menu-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .menu-item:hover {
            background-color: #e3d4b4; 
        }

        .menu-item h4 {
            margin: 0;
            color: #7b5e2d; 
            cursor: pointer;
        }

        .menu-item p {
            margin: 5px 0;
            color: #6b4c20;
        }
        .header_login{
            letter-spacing:6px;
            font-family: monaco;
        }
        h1{
            color:brown;
            text-align:center;  
        }
        
        #image-container {
            width: 500px; 
            margin-left: auto; 
            margin-top: -700px;
            margin-right:100px;
            display: none;
        }

        #menu-image {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: opacity 1s;
        }
        .back-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top:9px;
            margin-left:9px;
        }
        .back-button:hover {
            background-color: brown;
        }
    </style>
</head>
<body>
    <button class="back-button" onclick="goBack()">Go back</button>
    <div class="container">
    <h2 class="header_login">KATIPUNAN <p>(Menu)</p><img src="pics/coffee-beans.png" width="30px" height="30px" > </h2>
       
        <div class="category">
            <h3>Coffee</h3>
            <div class="menu-item" onmouseover="changeImage('pics/black-coffee-benefits.jpg')" onmouseout="resetImage()">
                <h4 onclick="showImage('coffee')">Black Coffee</h4>
                <p>Americano, Brewed Coffee</p>
            </div>
            <div class="menu-item" onmouseover="changeImage('pics/es.png')" onmouseout="resetImage()">
                <h4 onclick="showImage('espresso')">Espresso</h4>
                <p>Single Shot, Double Shot</p>
            </div>
          
        </div>
        <div class="category">
            <h3>Frappe</h3>
            <div class="menu-item" onmouseover="changeImage('pics/classicfrappe.jpg')" onmouseout="resetImage()">
                <h4 onclick="showImage('c_frappe')">Classic Frappe</h4>
                <p>Mocha, Caramel, Vanilla</p>
            </div>
            <div class="menu-item" onmouseover="changeImage('pics/frapstrawberry.jpg')" onmouseout="resetImage()">
                <h4 onclick="showImage('f_frappe')">Fruit Frappe</h4>
                <p>Strawberry, Mango, Banana</p>
            </div>
         
        </div>
        <div class="category">
            <h3>Pastries</h3>
            <div class="menu-item" onmouseover="changeImage('pics/croisants.jpg')" onmouseout="resetImage()">
                <h4 onclick="showImage('bread')">Croissants</h4>
                <p>Plain, Chocolate, Almond</p>
            </div>
            <div class="menu-item" onmouseover="changeImage('pics/muffins.jpg')" onmouseout="resetImage()">
                <h4>Muffins</h4>
                <p onclick="showImage('muffin')">Blueberry, Chocolate Chip, Banana Nut</p>
            </div>
       
        </div>
        <div class="category">
            <h3>Snacks</h3>
            <div class="menu-item" onmouseover="changeImage('pics/chipp.jpg')" onmouseout="resetImage()">
                <h4>Chips</h4>
                <p>Classic, BBQ, Sour Cream</p>
            </div>
            <div class="menu-item" onmouseover="changeImage('pics/sandwhich.jpg')" onmouseout="resetImage()">
                <h4>Sandwiches</h4>
                <p>Ham & Cheese, Turkey Club, Veggie</p>
            </div>
            
        </div>
    </div>

      <!-- Image container -->
      <div id="image-container">
        <img id="menu-image" src="placeholder.jpg" alt="Menu Image">
    </div>

    <!-- JavaScript code -->
    <script>
        function changeImage(imageSrc) {
            var menuImage = document.getElementById('menu-image');
            menuImage.src = imageSrc;
            document.getElementById('image-container').style.display = 'block';
        }

        function resetImage() {
            document.getElementById('menu-image').src = 'placeholder.jpg';
            document.getElementById('image-container').style.display = 'none';
        }
  
    </script>
          <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
