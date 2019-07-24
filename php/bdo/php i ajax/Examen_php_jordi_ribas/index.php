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
<?php
   // var_dump($_POST);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <label>Client</label>
            <input class="form-control" type="text" id="nom_client">
        </div>
        <div class="col-xs-6">
            <label>Empleat</label>
            <input class="form-control" type="text" id="empleat">
        </div>
    </div>
</div>
<div class="container">
    <h3 style="text-align: center;">Orders</h3>
    <table class="table table-striped" id="taula">
        <thead>
        <tr>
            <th scope="col" class="text-center">Order ID</th>
            <th scope="col" class="text-center">Customer Name</th>
            <th scope="col" class="text-center">Employee Name</th>
            <th scope="col" class="text-center">Order Date</th>
            <th scope="col" class="text-center">Shipped Date</th>
        </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
    <div class="container">
        <ul id="pagination">

        </ul>
    </div>
</div>
<div class="container">
    <a class="btn btn-primary" href="formulari.php" role="button">Afegir</a>
</div>
<script>
    $(document).ready(function () {

        $.ajax({
            url: 'getOrders.php',
            method: 'GET',
            success: function (result) {
                $('#tbody').html(result);
                // Pagination(1);

            }
        })

        var empleat = "";
        var nom_client = "";

        $('#nom_client').keyup(function() {
           nom_client = $('#nom_client').val();
            empleat = $('#empleat').val();
            if(empleat.length === 0)
            {
                $.ajax({
                    url: 'livesearchclient.php?nom_client='+nom_client,
                    method: 'GET',
                    success: function (result) {
                        $("#tbody").html(result);
                        // Pagination(2, nom_client);
                    }
                })
            }
            else {
                $.ajax({
                    url: 'livesearch.php?nom_client='+nom_client+'&empleat='+empleat,
                    method: 'GET',
                    success: function (result) {
                        $("#tbody").html(result);
                        //Pagination(4, nom_client, empleat);
                    }
                })
            }
        });
        $('#empleat').keyup(function() {
            empleat = $('#empleat').val();
            nom_client = $('#nom_client').val();
            if(nom_client.length === 0)
            {
                $.ajax({
                    url: 'livesearchempresa.php?empleat='+empleat,
                    method: 'GET',
                    success: function (result) {
                        $("#tbody").html(result);
                        //Pagination(3, empleat);
                    }
                })
            }
            else{
                $.ajax({
                    url: 'livesearch.php?nom_client='+nom_client+'&empleat='+empleat,
                    method: 'GET',
                    success: function (result) {
                        $("#tbody").html(result);
                        // Pagination(4, nom_client, empleat);
                    }
                })
            }
        });
    });

    // function Pagination(id, param1, param2) {
    //     var n_rows = $('.pg:first').text();
    //
    //     $.ajax({
    //         url: 'pagination.php?pag='+n_rows+'&type='+id+'&param1='+param1'&param2='+param2,
    //         method: 'GET',
    //         success: function (result) {
    //             $('#pagination').html(result);
    //         }
    //     });
    // }
</script>
</body>

</html>
