<?php

function logEvent($message) {
    if ($message != '') {
        // Add a timestamp to the start of the $message
        $message = date("Y/m/d H:i:s").': '.$message;
        $fp = fopen('events.txt', 'a');
        fwrite($fp, $message."\n");
        fclose($fp);
    }
}
if(isset($_POST['name'])){

    echo 'The error of this request is : name => ' . $_POST['name'] . ' while '. $_POST['email'] . ' .';
    logEvent('The error of this request is : name => ' . $_POST['name'] . ' while '. $_POST['email'] . ' text : '. json_encode($_POST) . ' .');
    
}