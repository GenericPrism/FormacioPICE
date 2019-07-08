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
<?php
$con = new mysqli("localhost", "root", "", "northwind");

//$nom = $_POST['nom'];

$query = "SELECT * from categories where CategoryID = 1 ";
$result = $con->query($query);

$category = $result->fetch_assoc();

$con->close();
?>
<div class="container" id="customers">
    <h2>Afegir Distribuidor</h2>
    <form method="POST" action="update_category.php">
        <label>Nom</label>
        <input type="text" name="nom" value="<?php echo $category['CategoryName']; ?>">
        <textarea rows="4" cols="50">
           <?php echo $category['Description']; ?>
        </textarea>
        <input type="submit" value="Afegir">
    </form>

</div>
<script>
    $(document).ready(function () {

    });
</script>
</body>

</html>

