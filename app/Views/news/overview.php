<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2><?= esc($title); ?></h2>

        <?php if (!empty($news) && is_array($news)) : ?>

            <?php foreach ($news as $news_item): ?>

                <h3><?= esc($news_item['title']); ?></h3>

                <div class="main">
                    <?= esc($news_item['body']); ?>
                </div>
                <p><a href="/news/<?= esc($news_item['slug'], 'url'); ?>">View article</a></p>

            <?php endforeach; ?>

        <?php else : ?>

            <h3>No News</h3>

            <p>Unable to find any news for you.</p>

        <?php endif ?>
    </body>
</html>
