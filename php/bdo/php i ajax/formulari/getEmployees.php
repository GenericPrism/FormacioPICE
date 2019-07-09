<?php

$con = new mysqli("localhost", "root", "", "northwind");


    $sql = "SELECT * FROM employees";
    $result = $con->query($sql);

    while($employee = $result->fetch_assoc())
    {
        echo "<option value='".$employee['EmployeeID']."'>".$employee['FirstName']." ".$employee['LastName']."</option>";
    }

$con->close();

?>