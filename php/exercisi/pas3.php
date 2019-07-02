<?php 
    session_start();

    if(isset($_POST['color']))
    {
        $_SESSION['color'] = $_POST['color'];
    }

    echo "- vehicle: ".$_SESSION['vehicle'].".<br>- tipus: ".$_SESSION['tipus'].".<br>- color: ".$_SESSION['color'].".";
?>
