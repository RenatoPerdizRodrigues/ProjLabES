<?php
    include_once 'config.php';

    // generate urls according to root folder
    function generateRoute($url) {
        echo ROOT_FOLDER . $url;
    }
?>