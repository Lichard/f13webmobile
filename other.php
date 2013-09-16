<?
    include_once('dblogin.php');
    $db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
    if(mysqli_connect_error()){
        echo "Can't connect!";
        return null;
    }

    echo "connect successful";
}

