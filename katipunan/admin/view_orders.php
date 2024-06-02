
<?php
include "../db.php";
session_start();

if ($_SESSION['user_info_user_type'] != 'A') { // Assuming 'A' stands for Admin
    header("location: ../index.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ../index.php");
    die();
}

if (isset($_GET['delete_order'])) {
    $order_id = $_GET['delete_order'];
    $sql_delete_order = "DELETE FROM orders WHERE orders_id = '$order_id'";
    if ($conn->query($sql_delete_order) === TRUE) {
        echo "<script>alert('Order deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting order: " . $conn->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders - Katipunan Coffee Shop</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f2e8; /* Light beige */
            margin: 0;
            padding: 0%;
        }

        .navbar {
            background-color: brown; /* Light brown */
            padding: 10px;
        }

        .navbar a {
            color: #fff; /* White */
            padding: 10px 20px;
            text-decoration: none;
           float:left;
        }

        .navbar a:hover {
            background-color: #6b4c20; /* Dark brown */
            transition: 0.3s;
        }

        .container {
        
            width: 100%;
            margin:0;
           
            display: inline-block;

        }

        h1 {
            color: brown; /* Light brown */
            margin-bottom: 20px;
        }

        .table-container {
            background-color: #fff; /* White */
            border-radius: 10px;
            padding: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align:center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: brown; /* Light brown */
            color: #fff; /* White */
            width: 100%;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
        .hone{
            margin-left: 2%;
            margin-top: 2%;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="?logout" class="float-right">Logout</a>
    </nav>
    <h1 class="hone">View Orders <img src="../img/coffee-beans.png" width="50px" height="50px"></h1>
    <center>
    <div class="container">
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        
                        <th>Payment Method</th>
                        <th>GCash Ref Num</th>
                        <th>GCash Account Name</th>
                        <th>GCash Account Number</th>
                        <th>GCash Amount Sent</th>
                        <th>Shipper ID</th>
                        <th>User ID</th>
                        <th>Alternate Receiver</th>
                        <th>Alternate Address</th>
                        <th>Item ID</th>
                        <th>Date Added</th>
                        <th>Item Qty</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_get_orders = "SELECT * FROM orders";
                    $result = $conn->query($sql_get_orders);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['orders_id']; ?></td>
                               
                                <td><?php echo $row['payment_method']; ?></td>
                                <td><?php echo $row['gcash_ref_num']; ?></td>
                                <td><?php echo $row['gcash_account_name']; ?></td>
                                <td><?php echo $row['gcash_account_number']; ?></td>
                                <td><?php echo "Php " . number_format($row['gcash_amount_sent'], 2); ?></td>
                                <td><?php echo $row['shipper_id']; ?></td>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['alternate_receiver']; ?></td>
                                <td><?php echo $row['alternate_address']; ?></td>
                                <td><?php echo $row['item_id']; ?></td>
                                <td><?php echo $row['date_added']; ?></td>
                                <td><?php echo $row['item_qty']; ?></td>
                                <td><?php echo $row['order_phase']; ?></td>
                            </tr>
                            <td>
                            <a href="?delete_order=<?php echo $row['orders_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                            </td>
                        <?php }
                    } else {
                        echo "<tr><td colspan='14'>No orders found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </center>
</body>
<script src="../js/bootstrap.js"></script>
</html>
