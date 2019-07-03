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
        td {
            text-align: center;
        }
        #form_id {
          display: none;
        }
    </style>
</head>

<body>
    <div class="container">
    <form>
        <label>Country:</label>
        <select name="country" id="country">
        </select>
    </form>
    <form id="form_id">
        <label>City:</label>
        <select name="city" id="city">
        </select>
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">Contact Name</th>
      <th scope="col" class="text-center">City</th>
      <th scope="col" class="text-center">Country</th>
      <!-- <th scope="col" class="text-center">Category ID</th>
      <th scope="col" class="text-center">Quantity x Unit</th>
      <th scope="col" class="text-center">Unit Price</th>
      <th scope="col" class="text-center">Units in Stock</th> -->
    </tr>
  </thead>
  <tbody id="taula">
   
  </tbody>
</table>
    </div>
    <script>
         $( document ).ready(function() {
            $.ajax({
              url: 'getCountrys.php',
              method: 'GET',
              success: function(result){
                $("#country").html(result);
              }
            })
            $('#country').on('change', function() {
                $.ajax({
                  url: 'customer2p.php?con='+this.value,
                  method: 'GET',
                  success: function(result){
                    $("#taula").html(result);
                  }
                }),
                $('#form_id').show();
                $.ajax({
                  url: 'customer2c.php?con='+this.value,
                  method: 'GET',
                  success: function(result){
                    $("#city").html(result);
                  }
                })
            });
            $('#city').on('change', function() {
              $.ajax({
                  url: 'customer2p.php?city='+this.value,
                  method: 'GET',
                  success: function(result){
                    $("#taula").html(result);
                  }
                })
            });
          });
    </script>
</body>

</html>

<!-- $('#city').on('change', function() {
                $.ajax({
                  url: 'customer2p.php?con='+this.value,
                  method: 'GET',
                  success: function(result){
                    $("#taula").html(result);
                  }
                }) -->