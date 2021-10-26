<?php
require "./config.php";
$id = $_REQUEST['id'];
var_dump($id);
if (!is_numeric($id) || $id <= 0) {
    print('数字で指定してください');
    exit();
}
$content =  $_POST['memo'];
try {
    $memo_sql = $conn->prepare('UPDATE memos SET memo = :content where id = :id');
    $memo_sql->bindValue(':content', $content);
    $memo_sql->bindValue(':id', $id);
    $memo_sql->execute();
    echo 'Finishing Update <br/>';
    echo "<a href='memo.php?id=$id'>Back to memo item</a>";
} catch (Exception $e) {
    echo 'Error '. $e->getMessage();
}
