<?php 
    $num1 = $_POST['num1'];
    $plat1 = $_POST['plat1'];
    $num2 = $_POST['num2'];
    $plat2 = $_POST['plat2'];

    $contador1 = 0;
    $contador2 = 0;
    if(isset($num1))
    {
        while($contador1 < $num1)
        {
            if($plat1 == "sopa")
            {
                echo "<img src='https://okdiario.com/img/2018/09/29/sopa-de-fideos-con-pollo-655x368.jpg' width=200px; height=200px;>";
            }
            if($plat1 == "macarrons")
            {
                echo "<img src='https://www.gallinablanca.cat/files/thumbs/33d7c8801a5c67b4f3a2d586b5cbebca6c65610e_r900_480_2.jpg' width=200px; height=200px;>";
            }
            
            $contador1++;
        }
    }
    if(isset($num2))
    {
        while($contador2 < $num2)
        {
            if($plat2 == "sopa")
            {
                echo "<img src='https://okdiario.com/img/2018/09/29/sopa-de-fideos-con-pollo-655x368.jpg' width=200px; height=200px;>";
            }
            if($plat2 == "macarrons")
            {
                echo "<img src='https://www.gallinablanca.cat/files/thumbs/33d7c8801a5c67b4f3a2d586b5cbebca6c65610e_r900_480_2.jpg' width=200px; height=200px;>";
            }

            $contador2++;
        }
    }
?>