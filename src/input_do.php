<?php require "./config.php" ?>
<h2>Practice</h2>
<?php
$statement = $conn->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
$statement->execute(array($_POST['memo']));
echo 'メッセージが登録されました'.PHP_EOL;
?>
<br/>
<a href="index.php">Homepage</a>