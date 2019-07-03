<?php 

$con = new mysqli("localhost", "root", "", "northwind");

if(!isset($_GET['order']))
{
    echo "No va bé";
}
else {
    $id = $_GET['order'];
    $query = "SELECT * from `order details` where OrderID = $id";

    $result = $con->query($query);

    while($details = $result->fetch_assoc())
    {
        echo "<tr><td>".$details['OrderID']."</td><td>".$details['ProductID']."</td><td>".$details['UnitPrice']."</td><td>".$details['Quantity']."</td></tr>";
    }
}
?>