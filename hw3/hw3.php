<?php
include_once('dblogin.php');
$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
if(mysqli_connect_error()){
    echo "Can't connect!";
    echo mysqli_connect_error();
    return null;
}
$type = (isset($_GET['type']) ? $_GET['type'] : null);
if($type!=null){
    if($type=='commentForm'){
        $name = $_GET['name'];
        $comment = $_GET['comment'];
        $time = time();

        $stmt = $db_connection->stmt_init();
        $numRecords = 0;
        if($stmt->prepare("insert into Comments values(?,?,?)")){

            $stmt->bind_param("sss", $time, $name, $comment);
            $stmt->execute();

            $stmt->close();
        }
        $db_connection->close();

        echo 'Comment posted! '  . $name . " commented: '" . $comment;
    }
    if($type=='userForm'){
        $name = $_GET['updateName'];
        $age = $_GET['updateAge'];
        $info = $_GET['info'];
        $stmt->bind_result($date, $day, $num, $topic, $desc);

        while ($stmt->fetch()) {
            $numRecords = $numRecords + 1;
            echo "Lecture: " . $num . "<br/>";
            echo "Topic: " . $topic . "<br/>";
            echo "Description: " . $desc . "<br/>";
        }

        if($numRecords == 0) {
            echo "No lecutre today.<br/>";
        }
        echo 'Successfully updated info for' . $name . "!";
    }
    if($type=='viewCommentForm'){

        echo $name . " " . $comment . " " . $time;
    }
}
?>
