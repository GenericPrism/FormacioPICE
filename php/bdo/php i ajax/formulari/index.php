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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>PHP FORMS 1</title>
    <style>
        #customers {
            height: 500px;
        }

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

        #dialog-confirm {
            display: none;
        }

        label {
            width: 150px;
        }
    </style>
</head>

<body>
<div class="container" id="customers">
    <h3 style="text-align: center;">Employees</h3>
    <button type="button" class="btn btn-primary" id="afegir">Afegir</button>
    <table class="table table-striped" id="taula">
        <thead>
        <tr>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Title</th>
            <th scope="col" class="text-center">Birth Date</th>
            <th scope="col" class="text-center">Hire Date</th>
        </tr>
        </thead>
        <tbody id="tbody">
        <?php

        $con = new mysqli("localhost", "root", "", "northwind");

        $query = "SELECT * from employees";

        $result = $con->query($query);

        while ($supplier = $result->fetch_assoc()) {
            echo utf8_encode("<tr><td>" . $supplier['FirstName'] . " " . $supplier['LastName'] . "</td><td>" . $supplier['Title'] . "</td><td>" . $supplier['BirthDate'] . "</td><td>" . $supplier['HireDate'] . "</td></td></tr>");
        }
        ?>
        </tbody>
    </table>
</div>
<div id="dialog-confirm" title="Add new employee">
    <form>
        <label>First Name:</label>
        <input type="text" name="first_name" id="firstname">
        <br><label>Last Name:</label>
        <input type="text" name="last_name" id="lastname">
        <br><label>Birth Date:</label>
        <input type="text" name="birth_date" id="birthdate">
        <br><label>Hire Date:</label>
        <input type="text" name="hire_date" id="hiredate">
        <br><label>Reports to:</label>
        <select name="reports_to" id="report_employee">
            <option value="">Choose an employee</option>
        </select>
    </form>
</div>
<script>
    $(document).ready(function () {
        $( "#birthdate" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#hiredate" ).datepicker({ minDate: -7, maxDate: "+7D", dateFormat: "yy-mm-dd" });
        $.ajax({
           url: 'getEmployees.php',
           method: 'GET',
           success: function (result) {
               $('#report_employee').html(result);
           }
        });
        $('#afegir').on('click', function () {
            $( "#dialog-confirm" ).dialog({
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                    "Add Employee": function() {
                        var firstname = $('#firstname').val();
                        var lastname = $('#lastname').val();
                        var birthdate = $('#birthdate').val();
                        var hiredate = $('#hiredate').val();
                        console.log(birthdate);
                        console.log(hiredate);
                        $.ajax({
                            url: 'addEmployee.php?first='+firstname+'&last='+lastname+'&birth='+birthdate+'&hire='+hiredate,
                            method: 'GET',
                            success: function (result) {
                               if(result)
                               {
                                   location.reload();
                               }
                            }
                        })
                        $( this ).dialog( "close" );
                    },
                    Cancel: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        })
    });
</script>
</body>

</html>
