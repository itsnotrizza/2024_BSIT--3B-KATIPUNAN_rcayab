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
    $sql_delete_from_cart = "DELETE FROM orders WHERE orders_id = '$order_id' and order_phase = '1' ";
    $sql_execute = mysqli_query($conn, $sql_delete_from_cart);
    if($sql_execute){
        header("location: index.php?page=home&msg=cart item removed.");
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
            padding-left:1%;
        
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
    .kape-content{
        width: 100%;
        float: left;
    }
    .gg{
        width: 45%;
        float: left;
        margin-left:5%;
    }
  
    </style>
</head>
<body>

    <div class="navbar">
        <div class="head"><h1>KATIPUNAN <img src="../img/coffee-beans.png" width="50px" height="50px"></h1></div>
       
        <a href="../menu.php">Menu</a>
    </div>
    <br>

    <h4 class="head">Welcome, <?php echo $_SESSION['user_info_fullname']; ?></h4>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
            <br>
                <div class="links">
                    <a href="?page=home" class="transparent-button">Home</a>
                    <a href="cart.php" class="transparent-button">Cart</a>
                    <a href="?page=myorder" class="transparent-button">My Orders</a>
                    <a href="?logout" class="transparent-button"><b>Logout</b></a>
                  
                </div>

                <?php if(isset($_GET['page'])){
                if($_GET['page'] == 'home'){ ?>


                <br>
                <hr>

<div class="kape-content">
                <h2>Coffee</h2>
                
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='1' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/black-coffee-benefits.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b> </td> 
                           
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

                
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='2' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/ame.png" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b> </td> 
                           
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
            <h2>Espresso</h2>
         
            <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='3' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/sss.png" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b></td>
                           
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

            <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='4' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/ddd.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b></td>
                           
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


              
                        <!--waittt tig duplicate ko starts here -->
            <h2>Frappe</h2>
                
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='5' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/mf.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b> </td> 
                           
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

                
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='6' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/cff.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b> </td> 
                           
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
            
           
         

            <div class="tibang">
            <h2>Pastries</h2>
            
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='7' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/pcc.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b> </td> 
                           
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

               
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='8' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/mc.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b> </td> 
                           
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

            <h2>Chips</h2>
             
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='9' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/bc.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b> </td> 
                           
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

           
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='10' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/R.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b> </td> 
                           
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

           
                <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='11' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/R.png" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b> </td> 
                           
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
            
            <h2>Sandwiches</h2>
           
            <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='13' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/hci.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b></td>
                           
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


             
            <?php
                $sql_get_items = "SELECT * FROM `items` WHERE `items_id`='12' ORDER BY items_id DESC";
                $get_result = mysqli_query($conn, $sql_get_items); ?>
                <table class="table">
                    <?php
                    while ($row = mysqli_fetch_assoc($get_result)) { ?>
                        <tr>
                            <td><img src="../img/uy.jpg" width="50px" height="50px"><b><?php echo $row['item_name']; ?></b></td>
                           
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
            </div>
            
                    <hr>
                     
                    <div class="gg">    <h6 id="cart" class="display-6" >Cart</h6>
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
                                                              AND o.order_phase='1' ";

                                    $cart_results = mysqli_query($conn, $sql_get_cart_items);
                                echo "<table class='table'>";
                                    while($cart = mysqli_fetch_assoc($cart_results)){ ?>
                                           <tr>
                                              
                                               <td> <?php echo $cart['item_name'];?> </td>
                                               <td> <?php echo $cart['item_qty'] . " pcs";?> </td>
                                               <td> <?php echo "Php " . number_format($cart['item_price'] * $cart['item_qty'],2); ?> </td>
                                               <td> <a href="cart.php?delete_from_cart=<?php echo $cart['orders_id'];?>" class="btn btn-danger btn-sm">x</a> </td>
                                           </tr>
                                    <?php }
                                echo "</table>";
                                ?>
                               <a href="?page=home&checkout#cart" class="btn btn-warning">Checkout</a>
                                  <hr> 
                            </div>
                                    </div>
                          
        <div class="gg">

                <!--              Cart-->
                               <?php
                                if(isset($_GET['checkout'])){ ?>

                                    <div class="card p-1">
                                        <h3 class="card-title" >Checkout Summary</h3>

                                        <div class="card-body">
                                            <?php
                                    //generate order reference number
                                    $order_number=(8);

                                                $sql_checkout="SELECT i.item_name
                                                                , i.item_price
                                                                , i.item_desc
                                                                , i.item_img
                                                                , o.item_qty
                                                                , o.date_added
                                                                , o.orders_id
                                                             FROM `orders` as o
                                                             JOIN `items` as i
                                                               ON (o.item_id = i.items_id)
                                                            WHERE o.user_id='$s_user_id' 
                                                              AND o.order_phase='1'";
                                            $result_chkout = mysqli_query($conn,$sql_checkout);
                                            ?>
                                            <div class="alert alert-light">
                                                Order Reference Number: <?php echo $order_number; ?>
                                                <br>
                                                Receiver: <?php echo  $_SESSION['user_info_fullname'] ; ?>
                                                <br>
                                                Address: <?php echo $_SESSION['user_info_address']; ?>
                                            </div>

                                            <ul class="list-group">
                                                <?php
                                            //initialize total amount
                                            $total_amt = 0.00;
                                    
                                                while ($co = mysqli_fetch_assoc($result_chkout)){
                                                //adds up every loop of the result.
                                                $total_amt = $total_amt + ($co['item_price'] * $co['item_qty']);
                                                ?>

                                                    <li class="list-group-item"><?php echo $co['item_name'] . " - Php " . number_format($co['item_price'],2) . " x " . $co['item_qty'] . " pcs";?></li>
                                                <?php 
                                                }
                                                ?>
                                                <li class="list-group-item">
                                                   <b> Total Amount to Pay: <?php echo "Php " . number_format($total_amt,2);?> </b>
                                                </li>
                                            </ul>

                                            <form action="process_place_order.php" method="post">
                                                <div class="mt-3">

                                                   <input type="text" hidden name="f_total_amt_to_pay" value="<?php echo $total_amt; ?>">
                                                    <label for="">Alternate Receiver Name:</label>
                                                        <input type="text" class="form-control mb-3" placeholder="This is Optional" name="f_alt_receiver">
                                                    <label for="">Ship to this Address:</label>
                                                        <input type="text" class="form-control mb-3" placeholder="This is Optional" name="f_alt_address">
                                                    <label for="" class="form-label">Payment Method:</label> 
                                                    <select name="f_payment_method" id="" class="form-select mb-3">
                                                        <?php  
                                                        $sql_get_payment_method = "SELECT * FROM `payment_method`";
                                                        $payment_method_result = mysqli_query($conn, $sql_get_payment_method);

                                                        while($pm = mysqli_fetch_assoc($payment_method_result)){ ?>
                                                            <option value="<?php echo $pm['payment_method_id'];?>"><?php echo $pm['payment_method_desc'];?></option>
                                                        <?php }
                                                        ?>

                                                    </select>
                                                    
                                                    <label for="">Shipping Options:</label>
                                                        <select name="f_ship_option" class="form-select mb-2" id="">
                                                                                           <?php  
                                                        $sql_get_shipping_method = "SELECT * FROM `shippers`";
                                                        $shipping_method_result = mysqli_query($conn, $sql_get_shipping_method);;

                                                        while($pm = mysqli_fetch_assoc($shipping_method_result)){ ?>
                                                            <option value="<?php echo $pm['shipper_id'];?>"><?php echo $pm['shipping_company'];?></option>
                                                        <?php }
                                                        ?>
                                                        </select>
                                                    
                                                    <input readonly hidden type="text" name="f_order_ref_number" value="<?php echo $order_number; ?>">

                                                    <input type="submit" value="Place Order" class="btn btn-warning">
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                <?php } ?>

                               <?php
                                if(isset($_GET['msg'])){
                                     $msg = $_GET['msg']; 
                                     $status = "";
                                        if($msg == 1){
                                            $status = "Order Placed Successfully.";
                                            ?>
                                            <div class="alert alert-success">
                                                <?php echo $status;?>
                                            </div>
                                <?php   }  
                                        else{
                                            $status = $_GET['msg'];
                                            ?>
                                            <div class="alert alert-danger">
                                                 <?php echo $status;?>
                                            </div>
                                            <?php
                                        }

                                }
                                ?>
                                 
                                
                <?php }
                else if($_GET['page'] == 'myorder'){ ?>
                    <div class="row">
                    
                    <?php
                        $sql_get_user_order = "SELECT DISTINCT 
                                                  o.order_ref_number
                                                , pm.payment_method_desc
                                                , o.payment_method
                                                , op.order_phase_desc
                                                , o.order_phase
                                                , o.alternate_receiver
                                                , o.alternate_address
                                                , o.gcash_ref_num
                                                , o.gcash_account_name
                                                , o.gcash_account_number
                                                , o.gcash_amount_sent
                                             FROM `orders` as o
                                             JOIN `payment_method` as pm
                                               ON o.payment_method = pm.payment_method_id
                                             JOIN `order_phase` as op
                                               ON o.order_phase = op.order_phase_id
                                            WHERE o.user_id = '$s_user_id' ";      
                    $result_orders = mysqli_query($conn, $sql_get_user_order);
                    
                    
                    while($rec = mysqli_fetch_assoc($result_orders)){ //first loop with only the order_reference_number ?>
                     <div class="col-3">
                         <div class="card mt-3">
                             <h6 class="card-title mt-1 ms-1"><?php 
                                                        echo $rec['order_ref_number'];
                                                        $curr_order_ref_number = $rec['order_ref_number'];
                                                    ?>
                                                    <div class="float-end">
                                                    <span class="badge rounded-pill text-bg-success"><?php echo $rec['payment_method_desc'];?></span>
                                                    <span class="badge rounded-pill 
                                                        <?php 
                                                                 switch($rec['order_phase']){
                                                                     case 0: echo "text-bg-danger";
                                                                         break;
                                                                     case 2: echo "text-bg-primary";
                                                                         break;
                                                                     case 3: echo "text-bg-info";
                                                                         break;
                                                                     case 4: echo "text-bg-warning";
                                                                         break;
                                                                     case 5: echo "text-bg-success";
                                                                         break;
                                                                     default: echo "text-bg-secondary";
                                                                 }
                                                                 ?> "><?php echo $rec['order_phase_desc'];?></span>
                                                   <?php if($rec['order_phase'] == '2') { ?>
                                                     <a href="process_cancel_order.php?cancel_order=<?php echo $rec['order_ref_number']; ?>" class="btn btn-danger btn-sm me-1"> x </a>
                                                   <?php } ?>
                                                    </div>
                                                    
                            </h6>
                            <?php
                             if($rec['payment_method'] == 1){  ?>
                                 <div class="card-caption p-2">
                                     <small class="small">Gcash Reference Number: <?php echo $rec['gcash_ref_num'];?></small> <br>
                                     <small class="small">Gcash Account Name: <?php echo $rec['gcash_account_name'];?></small> <br>
                                     <small class="small">Gcash Account Number: <?php echo $rec['gcash_account_number'];?></small> <br>
                                     <small class="small">Gcash Amount Sent: <?php echo $rec['gcash_amount_sent'];?></small>
                                 </div>
                             <?php }
                             ?>
                                        <?php
                                               $sql_get_user_item_order = "SELECT 
                                                                           i.item_name
                                                                         , i.item_img
                                                                         , i.item_price
                                                                         , o.item_qty
                                                                      FROM `orders` as o
                                                                      JOIN `items` as i
                                                                        ON o.item_id = i.items_id
                                                                     WHERE o.user_id = '$s_user_id' 
                                                                         AND o.order_ref_number = '$curr_order_ref_number'";
                                              $result_item_orders=mysqli_query($conn, $sql_get_user_item_order); ?>
                                                <div class="list-group">
                                               <?php $total_amt = 0.00;
                                                    while($io = mysqli_fetch_assoc($result_item_orders)){ 
                                                    $total_amt = $total_amt + ($io['item_qty'] * $io['item_price']);
                                                    ?>
                                                   <li class="list-group-item">
                                                              <img src="../img/<?php echo $io['item_img'];?>" width="40px" alt="" class="img-fluid">
                                                               <?php echo $io['item_name'] . " x ";?>
                                                               <?php echo $io['item_qty'] . " pcs <br>";?>
                                                              <small class="small float-end"> <?php echo "Php " . number_format($io['item_price'],2);?></small>
                                                  </li>
                                               <?php } ?>
                                               
                                               
                                                </div>
                                                <div class="card-footer">
                                                    <span class="float-end"> Total Amount: <b> <?php echo "Php " . number_format($total_amt,2); ?> </b> </span> 
                                                </div>
                                               
                                                    <?php if($rec['alternate_receiver'] != NULL){ ?>
                                                         <div class="card-footer">
                                                               <small class="small">
                                                                <?php echo "Alternate Receiver: " . $rec['alternate_receiver'] . "<br>"; ?>
                                                                <?php echo "Alternate Address: " . $rec['alternate_address'] . "<br>"; ?>
                                                                </small>
                                                        </div>
                                                    <?php } ?>
                                         
                             
                         </div>
                     </div>
                    <?php }
                    ?>
<!--                    load the My Order Page-->
                    </div>
                <?php }
    }
  
    ?>
      
    </div>
    </div>

    
</body>
<script src="../js/bootstrap.js"></script>
</html>