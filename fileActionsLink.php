<?php 
include 'queries.php';

    if(isset($_GET['id'])) {
   
        $id = intval($_GET['id']);
    
        if($id <= 0) {
            die('The ID is invalid!');
        } else {
            $result = Queries::downloadFile($id);

            if($result) {
                if($result->num_rows == 1) {
                    $row = mysqli_fetch_assoc($result);

                    header("Content-Type: ". $row['mime']);
                    header("Content-Length: ". $row['size']);
                    header("Content-Disposition: attachment; filename=". $row['name']);

                    echo $row['data'];
                } else {
                    $_SESSION['file']['error'] = 'Error! No image exists with that ID.';
                }

                Queries::clear($result);
            } else {
                $_SESSION['file']['error'] = "Error! Query failed: <pre>{$result->error}</pre>";
            } 
        }
    } else {
        $_SESSION['file']['error'] = 'Error! No ID was passed.';
    }
?>