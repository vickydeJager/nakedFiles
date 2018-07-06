<?php
require "funcConnection.php";
require_once "funcDatabase.php";

$serverName     = "localhost";
$userName       = "root";
$password       = "root";
$db             = "fileHandler";

$conn = connection($serverName, $userName, $password);

if ($conn){
    database($db, $conn); //db_exists
}

?>