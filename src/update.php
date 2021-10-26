<?php require "./config.php";
$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0) {
    print('数字で指定してください');
    exit();
}
$memo_sql = $conn->prepare('SELECT * FROM memos WHERE id=:id');
$memo_sql->bindValue(':id', $id);
$memo_sql->execute();
$memo = $memo_sql->fetch();
?>
<h2>Practice</h2>
<form action="update_do.php?id=<?php echo $memo['id'] ?>" method="post">
    <textarea name="memo" cols="50" rows="10"><?php print($memo['memo']); ?></textarea>
    <br>
    <button type="submit">変更する</button>
</form>