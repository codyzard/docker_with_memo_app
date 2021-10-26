<?php require "./config.php"; ?>

<main>
    <?php
    if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    } else {
        $page = 1;
    }
    $start = 5 * ($page - 1);
    $memos = $conn->prepare('SELECT * FROM memos ORDER BY id LIMIT ?, 5');
    $memos->bindValue(1, $start, PDO::PARAM_INT);
    $memos->execute();
    $memo_list = $memos->fetchAll();
    ?>
    <p>Page <?php echo $page_index + 1 ?></p>
    <article>
        <?php foreach ($memo_list as $m) : ?>
            <p><a href="memo.php?id=<?php print($m['id']); ?>"><?php print(mb_substr($m['memo'], 0, 20)); ?>...</a></p>
            <time><?php print($m['created_at']); ?></time>
            <hr>
        <?php endforeach ?>
    </article>
    <br />
    <?php if ($page >= 2): ?>
    <a href="index.php?page=<?php print($page - 1); ?>"><?php print($page - 1); ?>ページ目へ</a>
    <?php endif; ?>
    |
    <?php
    $counts = $conn->query('SELECT COUNT(*) as cnt FROM memos');
    $count = $counts->fetch();
    $max_page = floor($count['cnt'] / 5) + 1;
    if ($page < $max_page):
    ?>
    <a href="index.php?page=<?php print($page + 1); ?>"><?php print($page + 1); ?>ページ目へ</a>
    <?php endif; ?>
    <br />
    <a href="input.php">create new memo</a>
</main>