<?php
include_once('dblogin.php');
$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
if(mysqli_connect_error()){
    echo "Can't connect!";
    echo mysqli_connect_error();
    return null;
}
    $type=$_GET['type'];
if($type=='commentForm'){
    $name = $_GET['name'];
    $comment = $_GET['comment'];
    $time = date();
    echo $name . " " . $comment . " " . $time;

    $stmt = $dbconnection->stmt_init();

    if($stmt->prepare('select deptID, courseNum, from section where seatsTaken >= ? and asdfasdfasdf')){

        $stmt->bind_param("ss", $min, $max);

        stmt->execute();

        stmt->bind_result($...........);

        while($stmt->fetch())
            echo $deptID . "" . $coursenum . "";
        }

    }
}
?>
