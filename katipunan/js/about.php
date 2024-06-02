<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Katipunan Coffee Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f2e8; /* Light beige */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
            text-align: justify;
        }

        h2 {
            color: #7b5e2d; /* Light brown */
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            line-height: 1.6;
            color: #6b4c20; /* Dark brown */
        }

        .highlight {
            background-color: #ffe4b2; /* Light yellow */
            padding: 5px 10px;
            border-radius: 5px;
        }

        .quote {
            font-style: italic;
            margin-top: 20px;
            color: #7b5e2d; /* Light brown */
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
            <h2>About Us</h2>
            <p>Welcome to Katipunan Coffee Shop! Katipunan is an online shop that sells variety of coffees' and pastries, that will satisfy the cravings of each customers. We are 24/7. Located at Del Rosario St. Libon, Albay. We're open for walk-in orders and online. We are passionate about delivering the finest coffee experience to our customers. Our journey began with a simple idea: to create a cozy space where people can come together to enjoy delicious coffee and great company.</p>
            <p>At Katipunan Coffee Shop, we believe in sourcing the highest quality beans from around the world and handcrafting each cup with care. Whether you're a coffee connoisseur or just starting your coffee journey, we have something for everyone.</p>
            <p>Our friendly staff is here to guide you through our menu and help you discover your new favorite drink. From classic brews to specialty blends, there's always something new to explore at Katipunan Coffee Shop.</p>
            <p>Come join us and experience the warmth and flavor of our coffee. We can't wait to share our love for coffee with you!</p>
            <div class="quote">
                <p><span class="highlight">"Life begins after coffee."</span></p>
            </div>
        </div>
        <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
