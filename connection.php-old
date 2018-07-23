<?php
    require "funcConnection.php";
    require_once "funcDatabase.php";
    require "funcConnReady.php";


    $serverName     = "localhost";
    $userName       = "root";
    $password       = "root";
    $db             = "nakedfiles";

    $conn = connection($serverName, $userName, $password);

    if ($conn){
        $dbcheck = database($db, $conn); //db_exists
        if ($dbcheck){
            $connReady = newConn($serverName, $userName, $password, $db);
        }
    }

    $conn->close();
?>