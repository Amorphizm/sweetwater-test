<?php
    include_once 'includes/Comment.php';
    include_once 'includes/dbh.php';

    $commentGroups = [];
    $sql = "select * from sweetwater_test;";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $comment = new Comment($row['orderid'], $row['comments'], $row['shipdate_expected']);
        if(!array_key_exists($comment->commentsType, $commentGroups)) {
            $commentGroups[$comment->commentsType] = [];
        }
        array_push($commentGroups[$comment->commentsType], $comment);
    }

    function printTable($comments) {
        $tableStr = '<table>';
        foreach($comments as $comment) {
            $rowStr = ' 
            <tr>
                <td>'.$comment->orderId.'</td>
                <td>'.$comment->comments.'</td>
                <td>'.$comment->shipdate_expected.'</td>
            </tr>';
            $tableStr = $tableStr.$rowStr;
        }
        return $tableStr.'</table>';
    } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"><meta charset="UTF-8">
        <title>Comments</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="">
            <h1>Comments</h1>
        </div>

        <div>
            <h3>Candy Related Comments</h3>
            <?php
                echo printTable($commentGroups['candy']);
            ?>
        </div>

        <div>
            <h3>Call Related Comments</h3>
            <?php
                echo printTable($commentGroups['call']);
            ?>
        </div>

        <div>
            <h3>Referred Related Comments</h3>
            <?php
                echo printTable($commentGroups['refer']);
            ?>
        </div>

        <div>
            <h3>Signature Related Comments</h3>
            <?php
                echo printTable($commentGroups['signature']);
            ?>
        </div>

        <div>
            <h3>Misc. Related Comments</h3>
            <?php
                echo printTable($commentGroups['other']);
            ?>
        </div>
    </body>
</html>