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
        td {
            text-align: center;
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
        label {
            display: inline-block;
        }
    </style>
</head>

<body>
<div class="container">
    <form method="post" action="index.php">
        <label>Empleat</label>
        <select name="empleat" id="empleat" class="form-control">

        </select>
        <label>Empresa</label>
        <select name="empresa" id="empresa" class="form-control">

        </select>
        <label>Productes</label>
        <button type="button" class="btn btn-primary" id="afegir">+</button>
        <button class="btn btn-primary" type="submit">Afegir</button>
        <div id="aClonar">
            <input type="number" name="quantity" class="form-control">
            <select name="products" id="products" class="form-control">

            </select>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: 'getEmployees.php',
            method: 'GET',
            success: function (result) {
                $('#empleat').html(result);
            }
        })
        $.ajax({
            url: 'getCustomers.php',
            method: 'GET',
            success: function (result) {
                $('#empresa').html(result);
            }
        })
        $.ajax({
            url: 'getProducts.php',
            method: 'GET',
            success: function (result) {
                $('#products').html(result);
            }
        });

        $("#afegir").on("click", function(){
            var consClone = $('#aClonar').clone();

            $('#aClonar').parent().append(consClone);
        });
    });
</script>
</body>
</html>
