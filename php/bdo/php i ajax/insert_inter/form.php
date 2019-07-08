<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $con = new mysqli("localhost", "root", "", "northwind");


    $query = "SELECT * from suppliers where SupplierID = $id";
    $result = $con->query($query);

    $suppliers = $result->fetch_assoc();

    echo       "<label>Company Name</label>
                <input type='text' value='" . $suppliers['CompanyName'] . "'>
                <label>Contact Name</label>
                <input type='text' value='" . $suppliers['ContactName'] . "'>
                <input type='hidden' value='" . $suppliers['SupplierID'] . "'><input type=\"submit\" value=\"Modificar\">";

    $con->close();
} if(isset($_GET['insert']))
{

}
?>