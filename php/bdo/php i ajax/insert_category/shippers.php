<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../../../plugins/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/46d6e5048e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
    <title>PHP FORMS 1</title>
    <style>
        #customers {
            height: 500px;
        }

        td {
            text-align: center;
        }

        #form_id {
            display: none;
        }

        tr:hover {
            background-color: yellow;
        }

        table.table-striped tbody tr.highlight {
            background-color: rgb(3, 252, 86);
        }

        ul {
            margin-left: 15%;
            text-align: center;
            list-style-type: none;
        }

        li {
            background-color: lightgray;
        }

        #taulaOrders, #taulaOrderDetails {
            display: none;
        }

        .info {
            margin-top: 40px;
        }
    </style>
</head>

<body>
<div class="container" id="customers">
    <h3 style="text-align: center;">Shippers</h3>
    <table class="table table-striped" id="taula">
        <thead>
        <tr>
            <th scope="col" class="text-center">Company Name</th>
            <th scope="col" class="text-center">Phone</th>
            <th scope="col" class="text-center">Modify</th>
        </tr>
        </thead>
        <tbody id="tbody">

        <?php

        $con = new mysqli("localhost", "root", "", "northwind");

        if(isset($_POST['id']) && isset($_POST['nom']))
        {
            $id = $_POST['id'];
            $nom = $_POST['nom'];

            if($_POST['phone'] == "" || !isset($_POST['phone']))
            {
                $phone = "No té telefon";
            }
            else
            {
                $phone = $_POST['phone'];
            }

            $query = "Update shippers set CompanyName = '".$nom."', Phone = '".$phone."' where ShipperID = ".$id." ";
            if ($con->query($query) === TRUE) {

            } else {
                echo "Error updating record: " . $con->error;
            }
        }

        $query = "SELECT * from shippers";
        $result = $con->query($query);

        while ($shippers = $result->fetch_assoc())
        {
            echo "<tr><td>".$shippers['CompanyName']."</td><td>".$shippers['Phone']."</td><td><a href='updateShippers.php?id=".$shippers['ShipperID']."'>Modify</a></td></tr>";
        }

        $con->close();
        ?>

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {

    });
</script>
</body>

</html>
