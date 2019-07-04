<?php 

$con = new mysqli("localhost", "root", "", "northwind");

$query2 = "SELECT DISTINCT(Country) from customers order by Country";

$result2 = $con->query($query2);

while($countries = $result2->fetch_assoc())
{
  echo "<option value=".$countries['Country'].">".$countries['Country']."</option>";
}
?>