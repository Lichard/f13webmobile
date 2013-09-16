<?php
    include_once('dblogin.php');
    $db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
    if(mysqli_connect_error()){
        echo "Can't connect!";
        echo mysqli_connect_error();
        return null;
    }

    echo "connect successful";
    $min = $_GET['min'];
    $max = $_GET['max'];

    echo $min . " / " . $max;

    $stmt = $dbconnection->stmt_init();

    if($stmt->prepare()){

    }
?>
