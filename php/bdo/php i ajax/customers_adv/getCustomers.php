<?php

$con = new mysqli("localhost", "root", "", "northwind");

if (!isset($_GET['offset'])) {
    $offset = 0;
} else {
    $offset = $_GET['offset'];
}

$query = "SELECT * from customers LIMIT $offset, 10";

$result = $con->query($query);

while ($customers = $result->fetch_assoc()) {
    echo "<tr><td>" . $customers['CustomerID'] . "</td><td>" . $customers['CompanyName'] . "</td><td>" . $customers['ContactName'] . "</td><td>" . $customers['City'] . "</td><td>" . $customers['Country'] . "</td></tr>";
}

?>