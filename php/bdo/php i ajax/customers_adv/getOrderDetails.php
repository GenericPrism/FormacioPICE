<?php

$con = new mysqli("localhost", "root", "", "northwind");

if (!isset($_GET['order'])) {
    echo "No va bé";
} else {
    $id = $_GET['order'];
    $query = "SELECT * from order_details where OrderID = $id";

    $result = $con->query($query);

    while ($details = $result->fetch_assoc()) {
        $price = $details['UnitPrice'] * $details['Quantity'];

        if ($details['Discount'] != 0) {
            $discount = ($details['Discount'] * $details['UnitPrice']) + $details['Quantity'];
            $total = $price - $discount;
        } else {
            $total = $price;
        }

        echo "<tr><td>" . $details['OrderID'] . "</td><td>" . $details['ProductID'] . "</td><td>" . $details['UnitPrice'] . "</td><td>" . $details['Quantity'] . "</td><td><s>" . $price . "</s></td><td>" . $total . "</td></tr>";
    }
}
?>