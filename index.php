<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Katipunan Coffee Shop</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: beige;
    }

    .navbar {
      background-color: brown;
      padding: 15px 0;
      text-align: center;
  
    }

    .navbar a {
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      margin: 0 10px;
      border-radius: 5px;
     
    }

    .navbar a:hover {
      background-color: #7b5e2d;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      color: #7b5e2d;
      text-align: center;
    }

    p {
      text-align: center;
    }
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .slideshow-container {
      max-width: 600px;
      position: relative;
      margin: auto;
    }

    .slide {
      display: none;
    }

    .slide img {
      width: 100%;
      height: auto;
    }

    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      padding: 10px;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      border-radius: 5px;
      z-index: 1;
    }

    .prev {
      left: 10px;
    }

    .next {
      right: 10px;
    }

    /* Optional: Add a fade effect to the slides */
    .fade {
      animation-name: fade;
      animation-duration: 2s;
    }

    @keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }
    .cof{
        border-radius: 10px;
    }
    .head h1{
        text-align: center;
       color: black;
       font-family: monaco;
       letter-spacing: 5px;
        
    }
    .order-button {
      display: inline-block;
      background-color: #7b5e2d;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .order-button:hover {
      background-color: #6b4c20;
    }
    .transparent-button {
    background-color: brown;
    color: white;
    border: 3px solid brown;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin-top: 20px;
}

.transparent-button:hover {
    background-color: brown;
    color: white;
}
.links a{
    text-decoration: none;
    color: white;
   font-family: didot;
   
    
}
  </style>
</head>
<body>
    
  <div class="navbar">
  <div class="head"><h1>KATIPUNAN <img src="pics/coffee-beans.png" width="50px" height="50px"></h1></div>
    <a href="#">Home</a>
    <a href="menu.php">Menu</a>
    <a href="about.php">About Us</a>
    <a href="loginform.php">Login</a>
    <a href="registration.php">Sign up</a>
  </div>
  
 <br><br>
  <div class="slideshow-container">
  <div class="slide fade">
    <img src="pics/Cappuccino_at_Sightglass_Coffee-1.jpg" class="cof" alt="Coffee 1">
  </div>

  <div class="slide fade">
    <img src="pics/Free-Download-Coffee-Wallpapers-High-Quality.jpg" class="cof" alt="Coffee 2">
  </div>

  <div class="slide fade">
    <img src="pics/OIP.jpg" class="cof" alt="Coffee 3">
  </div>

  <!-- Navigation arrows -->
  <button class="prev" onclick="plusSlides(-1)">❮</button>
  <button class="next" onclick="plusSlides(1)">❯</button>
</div>

<script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
  }

  function plusSlides(n) {
    clearTimeout();
    showSlides(slideIndex += n);
  }
</script>

  <!-- <div class="container">
    <h1>Welcome to Katipunan Coffee Shop</h1>
    <p>Enjoy the finest coffee and pastries in a cozy atmosphere.</p>
  </div> -->
  <br><br>
  <CENter>
  <div class="links">
    <a href="loginform.php" class="transparent-button"><b>Order Now</b></a>
   </div>
  </CENter>
</body>
</html>
