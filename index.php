<!DOCTYPE html>
<html>
    <body>

    <form action="uploadFiles.php" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="upload">
    </form>

    <?php
    if(isset($_SESSION['file']['error'])){
        echo $_SESSION['file']['error'];
        unset($_SESSION['file']['error']);
    }
    if(isset($_SESSION['file']['success'])){
        echo $_SESSION['file']['success'];
        unset($_SESSION['file']['success']);
    }

    if(isset($_POST['open']))
    {
        print_r($_POST);
    }
    ?>

    <table>
        <thead>
            <th>name</th>
            <th>Content</th>
            <th></th>
        </thead>
        <tbody>
            <form>
            <?php
                include 'queries.php';
                $result = Queries::selectAllFiles();
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['data'] . "</td>";
                    echo "<td><input type='button' name='open' value='open' /></td>";
                    echo "</tr>";
                }
            ?>
            </form>
            <tr>
                <td></td>
            </tr>
            <?php Database::disconnect(); ?>
        </tbody>
    </table>

    </body>
</html>