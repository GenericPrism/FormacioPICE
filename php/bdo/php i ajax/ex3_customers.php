<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../../plugins/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/46d6e5048e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
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
    </style>
</head>

<body>
    <div class="container" id="customers">
    <table class="table" id="taula">
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

<table class="table" id="taulaOrders">
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

<table class="table" id="taulaOrderDetails">
  <thead>
    <tr>
      <th scope="col" class="text-center">Order ID</th>
      <th scope="col" class="text-center">Product ID</th>
      <th scope="col" class="text-center">Unit Price</th>
      <th scope="col" class="text-center">Quantity</th>
    </tr>
  </thead>
  <tbody id="tbodyOrderDetails">
   
  </tbody>
</table>

    </div>
    <script>
         $( document ).ready(function() {
            $.ajax({
              url: 'getCustomers.php',
              method: 'GET',
              success: function(result){
                $("#tbody").html(result);
              }
            });
            $(document).on("click", "#taula tbody tr", function() {
                $(this).css({ "background-color": "#03FC56"});
                var customerId = $(this).children('td:first').text();
                $.ajax({
                    url: 'getOrders.php?order='+customerId,
                    method: 'GET',
                    success: function(result){
                        $("#tbodyOrders").html(result);
                    }
                })
            });
            $(document).on("click", "#taulaOrders tbody tr", function() {
                var orderId = $(this).children('td:first').text();
                console.log(orderId);
                $.ajax({
                    url: 'getOrderDetails.php?order='+orderId,
                    method: 'GET',
                    success: function(result){
                        $("#tbodyOrderDetails").html(result);
                    }
                })
            });
          });
    </script>
</body>

</html>