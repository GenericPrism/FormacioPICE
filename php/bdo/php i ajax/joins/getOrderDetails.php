<?php
$con = new mysqli("localhost", "root", "", "northwind");

if (isset($_GET['order'])) {
    $order = $_GET['order'];
    $query = "SELECT p.ProductName, c.CategoryName, s.CompanyName FROM products p 
          LEFT JOIN categories c ON p.CategoryID = c.CategoryID
          LEFT JOIN suppliers s ON p.SupplierID = s.SupplierID
          LEFT JOIN order_details o ON p.ProductID = o.ProductID
          WHERE o.OrderID = $order";
} else {
    echo "Quelcom no va be";
}

$result = $con->query($query);

while ($details = $result->fetch_assoc()) {
    //$price = $details['UnitPrice'] * $details['Quantity'];

    echo utf8_encode("<tr><td>" . $details['ProductName'] . "</td><td>" . $details['CategoryName'] . "</td><td>" . $details['CompanyName'] . "</td></tr>");
}
?>