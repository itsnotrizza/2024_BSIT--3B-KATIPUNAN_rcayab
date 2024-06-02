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
    <title>cart</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<style>
 body {
            font-family: Arial, sans-serif;
            background-color: #f6f2e8; /* Light beige */
            margin: 0;
            padding: 2%;
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
            text-align:center;
            
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
        width: 40%;
        float: left;
    }
    .gg{
        width: 45%;
        float: left;
        margin-left:5%;
    }

</style>
<body>

<nav class="navbar">
                    <a href="index.php?page=home" class="transparent-button">Home</a>
                    <a href="index.php?page=myorder" class="transparent-button">My Orders</a>
                    <a href="?logout" class="transparent-button"><b>Logout</b></a>
                  


</nav>
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
                                               <td> <a href="?delete_from_cart=<?php echo $cart['orders_id'];?>" class="btn btn-danger btn-sm">x</a> </td>
                                           </tr>
                                    <?php }
                                echo "</table>";
                                ?>
                               <a href="?checkout" class="btn btn-warning">Checkout</a>
                                  <hr> 
                            </div>
                                    </div>
                          
        <div class="gg">

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

                                

        
</body>
</html>