<?php 
include_once "../db.php";
if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ../index.php");
    die();
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
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
<body>
<nav class="navbar">
        <a href="index.php">Home</a>
        <a href="?logout" class="float-right">Logout</a>
    </nav>
   <div class="container">
       <div class="row">
           <div class="col-6 mb-4">
                   <div class="card ps-1">
                       <h3 class="card-title">Total Sales</h3>
                       <small class="small">Per Item</small>
                       <div class="card-body">
                           <h1 class="display-1">
                               <?php $sql_get_totalsales = "SELECT * FROM `total_per_item`";
                               
                                     $sales_result = mysqli_query($conn, $sql_get_totalsales); ?>
                               
                               
                                <table class="table table-striped">
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                       $total = 0.00;
                                       while($rec = mysqli_fetch_assoc($sales_result)){
                                        $total += $rec['total_amt'];
                                        ?>
                                    <tr>
                                        <td><?php echo $rec['item_name'];?></td>
                                        <td><?php echo $rec['total_item_qty'];?></td>
                                        <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                                    </tr>      
                                             
                                         
                                     <?php } ?>
                                    <tr>
                                        <td colspan=3 class="bg-light"> <small class="float-end"><?php echo "Php " . number_format($total,2);?></small> </td>
                                    </tr>
                                </table>
                               
                           </h1>
                       </div>
                   </div>
               
           </div>
           <div class="col-6">
                   <div class="card ps-1">
                       <h3 class="card-title">Total Sales</h3>
                       <small class="small">Per Day</small>
                       <div class="card-body">
                           <h1 class="display-1">
                               <?php $sql_get_totalsales = "SELECT * FROM `total_per_date`";
                               
                                     $sales_result = mysqli_query($conn, $sql_get_totalsales); ?>
                               
                               
                                <table class="table table-striped">
                                    <tr>
                                        <th>Date</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                    $total = 0.00;
                                    while($rec = mysqli_fetch_assoc($sales_result)){
                                    $total += $rec['total_amt'];?>
                                    <tr>
                                        <td><?php echo $rec['transaction_date'];?></td>
                                        <td><?php echo $rec['total_item_qty'];?></td>
                                        <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                                    </tr>      
                                             
                                         
                                     <?php } ?>
                               
                                    <tr>
                                        <td colspan=3 class="bg-light"> <small class="float-end"><?php echo "Php " . number_format($total,2);?></small> </td>
                                    </tr>
                                </table>
                               
                           </h1>
                       </div>
                   </div>
               
           </div>
           <div class="col-6">
                   <div class="card ps-1">
                       <h3 class="card-title">Total Sales</h3>
                       <small class="small">Per Order</small>
                       <div class="card-body">
                           <h1 class="display-1">
                               <?php $sql_get_totalsales = "SELECT * FROM `total_per_order`";
                               
                                     $sales_result = mysqli_query($conn, $sql_get_totalsales); ?>
                               
                               
                                <table class="table table-striped">
                                    <tr>
                                        <th>Order Reference Number</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                     $total = 0.00;
                                    while($rec = mysqli_fetch_assoc($sales_result)){
                                     $total += $rec['total_amt'];
                                    ?>
                                    <tr>
                                        <td><?php echo $rec['order_ref_number'];?></td>
                                        <td><?php echo $rec['total_item_qty'];?></td>
                                        <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                                    </tr>      
                                             
                                         
                                     <?php } ?>
                                       <tr>
                                        <td colspan=3 class="bg-light"> <small class="float-end"><?php echo "Php " . number_format($total,2);?></small> </td>
                                    </tr>
                                </table>
                               
                           </h1>
                       </div>
                   </div>
               
           </div>
           <div class="col-6">
                   <div class="card ps-1">
                       <h3 class="card-title">Total Sales</h3>
                       <small class="small">Per User</small>
                       <div class="card-body">
                           <h1 class="display-1">
                               <?php $sql_get_totalsales = "SELECT * FROM `total_per_user`";
                               
                                     $sales_result = mysqli_query($conn, $sql_get_totalsales); ?>
                               
                               
                                <table class="table table-striped">
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                    $total=0.00;
                                    while($rec = mysqli_fetch_assoc($sales_result)){
                                     $total += $rec['total_amt'];
                                    ?>
                                    <tr>
                                        <td><?php echo $rec['fullname'];?></td>
                                        <td><?php echo $rec['username'];?></td>
                                        <td><?php echo $rec['total_item_qty'];?></td>
                                        <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                                    </tr>      
                                             
                                         
                                     <?php } ?>
                               
                                       <tr>
                                        <td colspan=4 class="bg-light"> <small class="float-end"><?php echo "Php " . number_format($total,2);?></small> </td>
                                    </tr>
                                </table>
                               
                           </h1>
                       </div>
                   </div>
               
           </div>
       </div>
   </div>
   
    
</body>
<script src="../js/bootstrap.js"></script>
</html>


