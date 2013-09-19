<?php
    $time = $_GET['time'];
    $name = $_GET['name'];
    $result = new DateTime($time);
    $initial = new DateTime($time);
    $result->sub( new DateInterval('PT8H'));

    echo 'Hello ' . $name . '!<br>';
    echo "To wake up at " . date_format($initial, 'h:i A') .  " you should try to sleep by " . date_format($result, 'h:i A') . ".";

    
?>
