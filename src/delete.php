<?php
require "./config.php";
$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0) {
    print('数字で指定してください');
    exit();
}
try {
    $memo_sql = $conn->prepare('DELETE FROM memos WHERE id=:id');
    $memo_sql->bindValue(':id', $id);
    $memo_sql->execute();
    echo 'Finishing Delete <br/>';
    echo "<a href='index.php'>Back to homepage</a>";
} catch (Exception $e) {
    echo 'Error '. $e->getMessage();
}