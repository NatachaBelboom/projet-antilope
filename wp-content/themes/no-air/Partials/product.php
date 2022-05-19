<div class="bestSeller__container">
    <figure>
        <?= get_the_post_thumbnail(null, 'medium', ['class' => 'post__thumb']) ?>
    </figure>
    <h3 class="bestSeller__container--title"><?= the_title() ?></h3>
    <p class="bestSeller__container--meaning"><?= get_field('meaning') ?></p>
    <a href="<?= get_the_permalink(); ?>">En savoir plus <span class="sro">sur le module <?= the_title() ?></span><img src="" alt="icone de flèche pointant vers la droite"></a>
</div>