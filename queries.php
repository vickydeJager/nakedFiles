<?php
include 'database.php';
class Queries {

    public static function selectAllFiles() {
        $conn = Database::connect();

        $sql = 'SELECT * FROM `files`';
        return $conn->query($sql);
    }
  
    public static function saveFile($name, $mime, $size, $data, $path) {
        $conn = Database::connect();

        $sql = "INSERT INTO files (name,mime,size,data,path,created) values('$name', '$mime', '$size', '$data', '$path', NOW())";
        return $conn->query($sql);
    }

    public static function downloadFile($id){
        $conn = Database::connect();

        $sql = "SELECT mime, name, size, data FROM files WHERE id = '$id'";
        return $conn->query($sql);
    }

    public static function selectFileToDelete($id){
        $conn = Database::connect();

        $sql = "SELECT name, path FROM files WHERE id = '$id'";
        return $conn->query($sql);
    }

    public static function deleteFile($id){
        $conn = Database::connect();

        $sql = "DELETE FROM files WHERE id = '$id'";
        return $conn->query($sql);
    }

    public static function clear($result){
       // self::mysqli_free_result($result);
    }
}
?>