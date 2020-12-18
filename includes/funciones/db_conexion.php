<?php
    $db = new mysqli('localhost', 'root', '', 'gdlwebcamp');
    if($db->connect_error) {
        echo $error -> $db->connect_error;
    }
?>