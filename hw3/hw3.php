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
        if($stmt->prepare("insert into Comments (`User`, `Message`) values(?,?)")){
            $stmt->bind_param("ss",$name, $comment);
            $stmt->execute();
            $stmt->close();
        }

        $stm = $db_connection->stmt_init();
        $numRecords = 0;
        if($stm->prepare("insert into Users (`Name`) values(?)")){
            $stm->bind_param("s",$name);
            $stm->execute();
            $stm->close();
        }
        $db_connection->close();
        echo 'Comment posted! '  . $name . " commented: '" . $comment;
    }
    if($type=='userForm'){
        $name = $_GET['updateName'];
        $age = $_GET['updateAge'];
        $info = $_GET['updateInfo'];

        $stmt = $db_connection->stmt_init();
        $numRecords = 0;
        if($stmt->prepare("update Users set `age` = ?, `info`=? where `name` = ?")){

            $stmt->bind_param("sss", $age, $info, $name);
            $stmt->execute();
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
            $stmt->close();
        }
        $db_connection->close();
        echo 'Successfully updated info for' . $name . "!";
    }
    if($type=='viewCommentForm'){
        $stmt = $db_connection->stmt_init();
        $numRecords = 0;
        if($stmt->prepare("select Comments.Timestamp, Comments.message, Users.name, Users.age, Users.info from Comments inner join Users on Comments.user=Users.name")){
            $stmt->execute();
            $stmt->bind_result($timestamp, $message, $name, $age, $info);

            while ($stmt->fetch()) {
                $numRecords = $numRecords + 1;
                echo "Timestamp: " . $timestamp . "<br/>";
                echo "Comment: " . $message . "<br/>";
                echo "By User: " . $name . " ";
                echo "Age: " . $age . " ";
                echo "Info: " . $info . "<br/>";
                echo "<br/>";
            }

            if($numRecords == 0) {
                echo "No comments yet.<br/>";
            }
            $stmt->close();
        }
        $db_connection->close();
    }
}
?>
