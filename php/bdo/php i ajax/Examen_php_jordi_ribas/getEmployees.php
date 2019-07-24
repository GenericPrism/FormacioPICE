<?php

    $con = new mysqli("localhost", "root", "", "northwind");
    $query = "SELECT * FROM employees";

    $result = $con->query($query);

    while($employee = $result->fetch_assoc())
    {
        echo utf8_encode("<option value='".$employee['EmployeeID']."'>".$employee['FirstName']." ".$employee['LastName']."</option>");
    }

    $con->close();
?>