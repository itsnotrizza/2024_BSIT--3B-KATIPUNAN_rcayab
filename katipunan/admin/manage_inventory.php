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

// Handle delete item request
if (isset($_GET['delete_item'])) {
    $item_id = $_GET['delete_item'];
    $sql_delete_item = "DELETE FROM items WHERE items_id = '$item_id'";
    if ($conn->query($sql_delete_item) === TRUE) {
        echo "<script>alert('Item deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting item: " . $conn->error . "');</script>";
    }
}

// Handle add/edit item request
if (isset($_POST['save_item'])) {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_desc = $_POST['item_desc'];
    $item_price = $_POST['item_price'];
    $item_status = $_POST['item_status'];

    if ($item_id) {
        // Update existing item
        $sql_update_item = "UPDATE items SET item_name='$item_name', item_desc='$item_desc', item_price='$item_price', item_status='$item_status' WHERE items_id='$item_id'";
        if ($conn->query($sql_update_item) === TRUE) {
            echo "<script>alert('Item updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating item: " . $conn->error . "');</script>";
        }
    } else {
        // Insert new item
        $sql_insert_item = "INSERT INTO items (item_name, item_desc, item_price, item_status) VALUES ('$item_name', '$item_desc', '$item_price', '$item_status')";
        if ($conn->query($sql_insert_item) === TRUE) {
            echo "<script>alert('Item added successfully');</script>";
        } else {
            echo "<script>alert('Error adding item: " . $conn->error . "');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Inventory - Katipunan Coffee Shop</title>
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
        }

        .navbar a {
            color: #fff; /* White */
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
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

        .table-container {
            background-color: #fff; /* White */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: brown; /* Light brown */
            color: #fff; /* White */
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-danger {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .btn-primary {
            background-color: #337ab7;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #286090;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar">
    <a href="index.php">Home</a>
        <a href="?logout" class="float-right">Logout</a>
        
    </nav>
    <div class="container">
        <h1>Manage Inventory <img src="../img/coffee-beans.png" width="50px" height="50px"></h1>
        <button class="btn btn-primary" onclick="document.getElementById('modalAddItem').style.display='block'">Add New Item</button>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Item Description</th>
                        <th>Item Price</th>
                        <th>Item Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_get_items = "SELECT * FROM items";
                    $result = $conn->query($sql_get_items);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['items_id']; ?></td>
                                <td><?php echo $row['item_name']; ?></td>
                                <td><?php echo $row['item_desc']; ?></td>
                                <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                                <td><?php echo $row['item_status']; ?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="editItem('<?php echo $row['items_id']; ?>', '<?php echo $row['item_name']; ?>', '<?php echo $row['item_desc']; ?>', '<?php echo $row['item_price']; ?>', '<?php echo $row['item_status']; ?>')">Edit</button>
                                    <a href="?delete_item=<?php echo $row['items_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo "<tr><td colspan='6'>No items found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit Item Modal -->
    <div id="modalAddItem" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('modalAddItem').style.display='none'">&times;</span>
            <h2 id="modalTitle">Add New Item</h2>
            <form method="post" action="">
                <input type="hidden" name="item_id" id="item_id">
                <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <input type="text" class="form-control" name="item_name" id="item_name" required>
                </div>
                <div class="form-group">
                    <label for="item_desc">Item Description</label>
                    <input type="text" class="form-control" name="item_desc" id="item_desc" required>
                </div>
                <div class="form-group">
                    <label for="item_price">Item Price</label>
                    <input type="number" class="form-control" name="item_price" id="item_price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="item_status">Item Status</label>
                    <select class="form-control" name="item_status" id="item_status" required>
                        <option value="A">Available</option>
                        <option value="U">Unavailable</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="save_item">Save</button>
            </form>
        </div>
    </div>

    <script>
        function editItem(item_id, item_name, item_desc, item_price, item_status) {
            document.getElementById('modalTitle').innerText = 'Edit Item';
            document.getElementById('item_id').value = item_id;
            document.getElementById('item_name').value = item_name;
            document.getElementById('item_desc').value = item_desc;
            document.getElementById('item_price').value = item_price;
            document.getElementById('item_status').value = item_status;
            document.getElementById('modalAddItem').style.display = 'block';
        }

        // Close modal if clicked outside
        window.onclick = function(event) {
            var modal = document.getElementById('modalAddItem');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
<script src="../js/bootstrap.js"></script>
</html>
