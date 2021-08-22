<h1>List News</h1>
<br>
<?php foreach ($news as $n) : ?>
    <div>
        <div><?= $n['id'] ?></div>
        <div><a href="<?= route('news.show', [
                            'id' => $n['id']
                        ]) ?>"><?= $n['title'] ?></a></div>
        <div><?= $n['description'] ?></div>
    </div>
<?php endforeach; ?>
