
<?php 
include_once "../db.php";

session_start();
if($_SESSION['user_info_user_type'] != 'A'){
    header("location: ../index.php");
}
if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ../index.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Katipunan Coffee Shop</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f2e8; /* Light beige */
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: brown; /* Light brown */
            padding: 10px;
            border:2%;
            border-color:white;
        }

        .navbar a {
            color: #fff; /* White */
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border:2%px;
            border-color:white;
        }

        .navbar a:hover {
            background-color: #6b4c20; /* Dark brown */
            transition: 0.3s;
        }

        .container {
            padding: 20px;
        }

        h1 {
            color: brown; /* Light brown */
            margin-bottom: 20px;
        }

        .dashboard-content {
            background-color: #fff; /* White */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-content h2 {
            color: brown; /* Light brown */
            margin-bottom: 20px;
        }

        .dashboard-content p {
            color: #333; /* Dark grey */
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: brown; /* Light brown */
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #6b4c20; /* Dark brown */
        }
        .head{
         
        }
    </style>
</head>
<body>

    <nav class="navbar">
  <h2 style="font-family: georgia;"><b>Katipunan</b> <img src="../img/coffee-beans.png" width="50px" height="50px"></h2>
        <a href="?logout" class="float-right">Logout</a>
    </nav>
    <div class="container">
    <h2 class="head"><i><b></i></b></h2>
        <div class="dashboard-content">
            <h2>Welcome, <?php echo $_SESSION['user_info_fullname']; ?></h2>
            <p>Good Day, Admin! Let's manage the Katipunan coffee shop's inventory, view orders, and update shop information. Have a great day!</p>
            <a href="manage_inventory.php" class="btn btn-primary">Manage Inventory</a>
            <a href="view_orders.php" class="btn btn-primary">View Orders</a>
            <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
        </div>
    </div>
</body>
<script src="../js/bootstrap.js"></script>
</html>
