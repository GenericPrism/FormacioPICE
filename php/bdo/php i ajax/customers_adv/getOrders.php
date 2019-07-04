<?php

$con = new mysqli("localhost", "root", "", "northwind");

if (!isset($_GET['order'])) {
    echo "No va bé";
} else {
    $id = $_GET['order'];
    $query = "SELECT * from orders where CustomerID = '$id'";

    $result = $con->query($query);

    while ($orders = $result->fetch_assoc()) {
        echo "<tr><td>" . $orders['OrderID'] . "</td><td>" . $orders['EmployeeID'] . "</td><td>" . $orders['OrderDate'] . "</td><td>" . $orders['ShippedDate'] . "</td></tr>";
    }
}
?>