<?php
include 'database.php';
class Queries{

    public static function selectAllFiles() {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `files`';
        return $pdo->query($sql, PDO::FETCH_ASSOC);
    }
  
    public static function saveFile($name, $mime, $size, $data, $path) {
        $pdo = Database::connect();

        $sql = "INSERT INTO files (name,mime,size,data,path) values('$name', '$mime', '$size', '$data', '$path')";
        return $pdo->query($sql, PDO::FETCH_ASSOC);
    }
}
?>