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
        #my_text {
            margin-top: 30px;
        }
    </style>
    <script>
    </script>
</head>

<body>
    <div class="container" style="text-align:center">
    <h3 id="sugeriment"></h3>
    <form>
        <label>Text a cercar:</label>
        <input type="text" size="30" id="my_text">
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">Customer ID</th>
      <th scope="col" class="text-center">Company Name</th>
      <th scope="col" class="text-center">Contact Name</th>
      <th scope="col" class="text-center">Contact Title</th>
    </tr>
  </thead>
  <tbody id="livesearch">
  </tbody>
</table>

    </div>
    <script>
        $( document ).ready(function() {
            $('#my_text').keyup(function() {
               var str = $('#my_text').val();
               console.log(str);
                if(str.length > 3)
                {
                    $.ajax({
                        url: "livesearch.php?q="+str,
                        method: 'GET',
                        success: function(result){
                            $("#livesearch").html(result);
                        }
                    })
                }
                else if(str.length == 0)
                {
                    $("#livesearch").html("");
                    $("#sugeriment").html("");
                }
                else if(str.length < 3)
                {
                    $("#sugeriment").html("Escriu més de 3 caràcters");
                }
                else if(str.length >= 3)
                {
                    $("#sugeriment").html("");
                }
            });
        });
    </script>
</body>

</html>