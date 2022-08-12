<?php
    include_once 'includes/dbh.php';
    include_once 'includes/Comment.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"><meta charset="UTF-8">
        <title>Comments</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <div class="">
            <h1>Comments</h1>
        </div>
        <?php
            $comments = [];
            $sql = "select * from sweetwater_test;";
            $result = mysqli_query($conn, $sql);
            while ($row = $result->fetch_assoc()) {
                array_push($comments, new Comment($row['orderid'], $row['comments'], $row['shipdate_expected']));
            }
            echo var_dump($comments);
        ?>
    </body>
</html>