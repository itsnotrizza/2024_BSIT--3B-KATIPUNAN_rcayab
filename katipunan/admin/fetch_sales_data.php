<?php
include "db.php";
session_start();
if ($_SESSION['user_info_user_type'] != 'A') { // Assuming 'A' stands for Admin
    header("location: ../index.php");
    die();
}

$sql_total_sales = "SELECT date, total_sales FROM total_per_date ORDER BY date";
$result = $conn->query($sql_total_sales);

$dates = [];
$sales = [];

while ($row = $result->fetch_assoc()) {
    $dates[] = $row['date'];
    $sales[] = $row['total_sales'];
}

$data = [
    'dates' => $dates,
    'sales' => $sales
];

echo json_encode($data);
?>