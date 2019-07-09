<?php

$con = new mysqli("localhost", "root", "", "northwind");


if( isset($_GET['first']) && isset($_GET['last']) && isset($_GET['birth']) && isset($_GET['hire']))
{
    $sql = "INSERT INTO employees (FirstName, LastName, BirthDate, HireDate) values('".$_GET['first']."','".$_GET['last']."', '".$_GET['birth']." 00:00:00', '".$_GET['hire']." 00:00:00')";

    if ($con->query($sql) === TRUE) {
        echo true;
    } else {
        echo false;
    }
}

$con->close();

?>