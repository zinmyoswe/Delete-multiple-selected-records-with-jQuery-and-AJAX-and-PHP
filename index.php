<?php 
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <title>Delete multiple selected records with jQuery and AJAX</title>
        <link href='style.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.0.0.js' type='text/javascript'></script>
        <script src='script.js' type='text/javascript'></script>
    </head>
    <body>
        <div class='container'>
            <!-- Delete button -->
            <input type='button' value='Delete' id='delete'><br><br>

            <!-- Table -->
            <table border='1' id='recordsTable' >
                <tr style='background: whitesmoke;'>
                    <th>&nbsp;</th>
                    <th>Title</th>
                </tr>

                <?php 
                $query = "SELECT * FROM posts";
                $result = mysqli_query($con,$query);

                $count = 1;
                while($row = mysqli_fetch_array($result) ){
                    $id = $row['id'];
                    $title = $row['title'];
                    $link = $row['link'];
                    
                ?>
                    <tr id='tr_<?= $id ?>'>
                        <td><input type='checkbox' id='del_<?php echo $id; ?>' ></td>
                        <td><a href='<?= $link; ?>'><?= $title; ?></a></td>
                    </tr>
                <?php
                    $count++;
                }
                ?>
            </table>
        </div>
    </body>
</html>