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
        



        echo 'Comment posted! '  . $name . " commented: '" . $comment;
    }
    if($type=='userForm'){
        $name = $_GET['updateName'];
        $age = $_GET['updateAge'];
        $info = $_GET['info'];
        echo 'Successfully updated info for' . $name . "!";
    }
    if($type=='viewCommentForm'){

        echo $name . " " . $comment . " " . $time;
    }
}
?>
