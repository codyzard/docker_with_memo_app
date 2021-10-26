<?php
require "./config.php";
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

<main>
    <article>
        <p><?php echo $memo['id'] ?></p>
        <p><?php print($memo['memo']); ?></p>
        <time><?php print($memo['created_at']); ?></time>
        <hr>
    </article>
    <a href="update.php?id=<?php echo $memo['id'] ?>">Edit</a>
    <a href="delete.php?id=<?php echo $memo['id'] ?>">Delete</a>
    <br>
    <a href="index.php">Back</a>
</main>