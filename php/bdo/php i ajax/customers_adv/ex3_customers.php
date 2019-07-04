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
    <h3 style="text-align: center;">Clients</h3>
    <table class="table table-striped" id="taula">
        <thead>
        <tr>
            <th scope="col" class="text-center">Customer ID</th>
            <th scope="col" class="text-center">Company Name</th>
            <th scope="col" class="text-center">Contact Name</th>
            <th scope="col" class="text-center">City</th>
            <th scope="col" class="text-center">Country</th>
        </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
    <div class="row" id="pagination" style="text-align:center;">
        <ul>
            <div class="col-xs-1 offset-xs-2">
                <li>
                    <a href="#">1</a>
                </li>
            </div>
            <div class="col-xs-1">
                <li>
                    <a href="#">2</a>
                </li>
            </div>
            <div class="col-xs-1">
                <li>
                    <a href="#">3</a>
                </li>
            </div>
            <div class="col-xs-1">
                <li>
                    <a href="#">4</a>
                </li>
            </div>
            <div class="col-xs-1">
                <li>
                    <a href="#">5</a>
                </li>
            </div>
            <div class="col-xs-1">
                <li>
                    <a href="#">6</a>
                </li>
            </div>
            <div class="col-xs-1">
                <li>
                    <a href="#">7</a>
                </li>
            </div>
            <div class="col-xs-1">
                <li>
                    <a href="#">8</a>
                </li>
            </div>
            <div class="col-xs-1">
                <li>
                    <a href="#">9</a>
                </li>
            </div>
        </ul>
    </div>

    <div class="row info">
        <div class="col-xs-6">
            <h3 style="text-align: center;">Comandes</h3>
            <table class="table table-striped" id="taulaOrders">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Order ID</th>
                    <th scope="col" class="text-center">Employee ID</th>
                    <th scope="col" class="text-center">Order Date</th>
                    <th scope="col" class="text-center">Shipped Date</th>
                </tr>
                </thead>
                <tbody id="tbodyOrders">

                </tbody>
            </table>
        </div>
        <div class="col-xs-6">
            <h3 style="text-align: center;">Info Comandes</h3>
            <table class="table table-striped" id="taulaOrderDetails">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Order ID</th>
                    <th scope="col" class="text-center">Product ID</th>
                    <th scope="col" class="text-center">Unit Price</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Price with Discount</th>
                </tr>
                </thead>
                <tbody id="tbodyOrderDetails">

                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: 'getCustomers.php',
            method: 'GET',
            success: function (result) {
                $("#tbody").html(result);
            }
        });
        $(document).on("click", "#taula tbody tr", function () {
            var selected = $(this).hasClass("highlight");
            $("#taula tbody tr").removeClass("highlight");
            if (!selected) {
                $(this).addClass("highlight");
            }
            var customerId = $(this).children('td:first').text();
            $.ajax({
                url: 'getOrders.php?order=' + customerId,
                method: 'GET',
                success: function (result) {
                    $("#tbodyOrders").html(result);
                }
            });
            $('#taulaOrders').show();
            $('#taulaOrderDetails').hide();
        });
        $(document).on("click", "#taulaOrders tbody tr", function () {
            var selected = $(this).hasClass("highlight");
            $("#taulaOrders tbody tr").removeClass("highlight");
            if (!selected) {
                $(this).addClass("highlight");
            }
            var orderId = $(this).children('td:first').text();
            console.log(orderId);
            $.ajax({
                url: 'getOrderDetails.php?order=' + orderId,
                method: 'GET',
                success: function (result) {
                    $("#tbodyOrderDetails").html(result);
                }
            });
            $('#taulaOrderDetails').show();
        });
        $(document).on("click", "ul li a", function () {
            var offset = $(this).text();
            $.ajax({
                url: 'getCustomers.php?offset=' + (offset * 10),
                method: 'GET',
                success: function (result) {
                    $("#tbody").html(result);
                }
            });
            $('#taulaOrders').hide();
            $('#taulaOrderDetails').hide();
        });
    });
</script>
</body>

</html>
