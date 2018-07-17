<?php 
require "queries.php";
if (isset($_GET['id'])) {

    $result = Queries::selectFileToDelete($_GET['id']);
    Queries::deleteFile($_GET['id']);

    if ($result) {
        if ($result->num_rows == 1) {
            $row = mysqli_fetch_assoc($result);
            if (!empty($row['path'])) {
                try {
                    //$link 
                    unlink($row['path']);
                    $_SESSION['file']['success'] = 'File has been delete';
                } catch(Exception $e) {
                    $_SESSION['file']['error'] = 'Error deleting file' . $e;
                }
                header('Location: index.php');
            }
        }
    }  
}
?>