<?php
include "../db.php";
session_start();
$s_user_id = $_SESSION['user_info_id'];
if($_SESSION['user_info_user_type'] != 'C'){
    header("location: ../index.php");
}
if(isset($_GET['logout'])){
    session_destroy();
    header("location: ../index.php");
    die();
}

if(isset($_GET['delete_from_cart'])){
    $order_id = $_GET['delete_from_cart'];
    $sql_delete_from_cart = "DELETE FROM orders WHERE orders_id = '$order_id'";
    $sql_execute = mysqli_query($conn, $sql_delete_from_cart);
    if($sql_execute){
        header("location: index.php?msg=cart_item_removed");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katipunan Coffee Shop</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f2e8; /* Light beige */
            margin: 0;
            padding: 0;
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

        .container-fluid {
            padding: 20px;
        }

        .row {
            margin-bottom: 30px;
        }

        .col-8 {
            border-right: 1px solid #ccc;
        }

        .col-8 h3 {
            color: #7b5e2d; /* Light brown */
            margin-bottom: 20px;
        }

        .col-8 table {
            background-color: #fff; /* White */
        }

        .col-4 {
            padding-left: 20px;
        }

        .col-4 h6 {
            color: #7b5e2d; /* Light brown */
            margin-bottom: 20px;
        }

        .col-4 table {
            background-color: #fff; /* White */
        }

        .btn-primary,
        .btn-danger,
        .btn-warning {
            margin-top: 10px;
        }
        .transparent-button {
            background-color: brown;
            color: white;
            border: 3px solid brown;
            padding: 9px 30px;
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
        .links{
            text-align:right;
            margin-top:-70px; 
        }
    .head{
        font-family: didot;
        margin-left:5px;
    }
    .tibang{
        margin-left:5px;
    }
    .carts{
        background-color:grey;
        color:white;
        padding:5px;
        text-align:center;
    }
    .xx{
        color:red;
        text-decoration:none;
        text:bold;
    }
  
    </style>
</head>
<body>

    <div class="navbar">
    <div class="head"><h1>KATIPUNAN <img src="../pics/coffee-beans.png" width="50px" height="50px"></h1></div>
        <a href="#">Home</a>
        <a href="menu.php">Menu</a>
    
       
    </div>
    <h3 class="head">Welcome, <?php echo $_SESSION['user_info_fullname']; ?></h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                
            <br>
                <div class="links">
                    <a href="?logout" class="transparent-button"><b>Logout</b></a>
                </div>
                <br>
                <hr>
                <h2>Coffee</h2>
                <h4 class="hed"><i><u>Black Coffee</u></i></h4>
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `item_status`='I' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><b><?php echo $row['item_name']; ?></b> </td> 
                           
                            <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                            <td> 
                                <form action="process_add_to_cart.php" method="get">
                                    <div class="input-group">
                                        <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['items_id']; ?>">
                                        <input type="number" class="form-control" name="cart_qty">
                                        <input type="submit" value="Add to Cart" class="btn btn-primary">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <h4 class="hed"><i><u>Espresso</u></i></h4>
            <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `item_status`='A' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><b><?php echo $row['item_name']; ?></b></td>
                           
                            <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                            <td> 
                                <form action="process_add_to_cart.php" method="get">
                                    <div class="input-group">
                                        <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['items_id']; ?>">
                                        <input type="number" class="form-control" name="cart_qty">
                                        <input type="submit" value="Add to Cart" class="btn btn-primary">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
                        <!--waittt tig duplicate ko starts here -->
            <h2>Frappe</h2>
                <h4 class="hed"><i><u>Classic Frappe</u></i></h4>
                <?php
                $sql_get_items = "SELECT * FROM `items_two` WHERE `item_status`='I' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><b><?php echo $row['item_name']; ?></b> </td> 
                           
                            <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                            <td> 
                                <form action="process_add_to_cart.php" method="get">
                                    <div class="input-group">
                                        <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['items_id']; ?>">
                                        <input type="number" class="form-control" name="cart_qty">
                                        <input type="submit" value="Add to Cart" class="btn btn-primary">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <h4 class="hed"><i><u>Fruit Frappe</u></i></h4>
            <?php
                $sql_get_items = "SELECT * FROM `items_two` WHERE `item_status`='A' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><b><?php echo $row['item_name']; ?></b></td>
                           
                            <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                            <td> 
                                <form action="process_add_to_cart.php" method="get">
                                    <div class="input-group">
                                        <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['items_id']; ?>">
                                        <input type="number" class="form-control" name="cart_qty">
                                        <input type="submit" value="Add to Cart" class="btn btn-primary">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="tibang">
            <h2>Pastries</h2>
                <h4 class="hed"><i><u>Croissants</u></i></h4>
                <?php
                $sql_get_items = "SELECT * FROM `items_three` WHERE `item_status`='I' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><b><?php echo $row['item_name']; ?></b> </td> 
                           
                            <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                            <td> 
                                <form action="process_add_to_cart.php" method="get">
                                    <div class="input-group">
                                        <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['items_id']; ?>">
                                        <input type="number" class="form-control" name="cart_qty">
                                        <input type="submit" value="Add to Cart" class="btn btn-primary">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <h4 class="hed"><i><u>Muffins</u></i></h4>
            <?php
                $sql_get_items = "SELECT * FROM `items_three` WHERE `item_status`='A' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><b><?php echo $row['item_name']; ?></b></td>
                           
                            <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                            <td> 
                                <form action="process_add_to_cart.php" method="get">
                                    <div class="input-group">
                                        <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['items_id']; ?>">
                                        <input type="number" class="form-control" name="cart_qty">
                                        <input type="submit" value="Add to Cart" class="btn btn-primary">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <h2>Snacks</h2>
                <h4 class="hed"><i><u>Chips</u></i></h4>
                <?php
                $sql_get_items = "SELECT * FROM `items_four` WHERE `item_status`='I' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><b><?php echo $row['item_name']; ?></b> </td> 
                           
                            <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                            <td> 
                                <form action="process_add_to_cart.php" method="get">
                                    <div class="input-group">
                                        <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['items_id']; ?>">
                                        <input type="number" class="form-control" name="cart_qty">
                                        <input type="submit" value="Add to Cart" class="btn btn-primary">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <h4 class="hed"><i><u>Sandwiches</u></i></h4>
            <?php
                $sql_get_items = "SELECT * FROM `items_four` WHERE `item_status`='A' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><b><?php echo $row['item_name']; ?></b></td>
                           
                            <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                            <td> 
                                <form action="process_add_to_cart.php" method="get">
                                    <div class="input-group">
                                        <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['items_id']; ?>">
                                        <input type="number" class="form-control" name="cart_qty">
                                        <input type="submit" value="Add to Cart" class="btn btn-primary">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            </div>
            
            <div class="col-6">
<hr>
            <div class="carts">
                <h1 style="color:red;font-family:verdana;">C A R T</h1>
                <?php
                $sql_get_cart_items = "SELECT i.item_name
                                                , i.item_price
                                                , i.item_desc
                                                , o.item_qty
                                                , o.date_added
                                                , o.orders_id
                                             FROM `orders` as o
                                             JOIN `items` as i
                                               ON (o.item_id = i.items_id)
                                            WHERE o.user_id='$s_user_id' 
                                              AND o.order_phase='1'";
                    
                    $cart_results = mysqli_query($conn, $sql_get_cart_items);
                    echo "<table class='table'>";
                    while($cart = mysqli_fetch_assoc($cart_results)){ ?>
                           <tr>
                               <td> <b style="color:yellow;"><?php echo $cart['item_name'];?> </b></td>
                               <td> <u><?php echo $cart['item_qty'] . " pcs";?> </u> </td>
                               <td> <u><?php echo "Php " . number_format($cart['item_price'] * $cart['item_qty'],2); ?></u> </td>
                               <td> <a href="?delete_from_cart=<?php echo $cart['orders_id'];?>" class="xx">x</a> </td>
                           </tr>
                    <?php }
                echo "</table>";
                ?>
                </div>
                <hr>
                <a href="" class="btn btn-warning">Checkout</a>
            </div>
        </div>
    </div>
    
</body>
<script src="../js/bootstrap.js"></script>
</html>
