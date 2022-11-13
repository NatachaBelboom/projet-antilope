<div class="publications__card publication">
    <figure class="publication__fig">
        <?= get_the_post_thumbnail(null, 'large', ['class' => 'publication__img']) ?>
    </figure>
    <div class="publication__infos">
        <p><?= the_title(); ?></p>
        <time class="date" datetime="<?= get_field('date') ?>"><?= get_field('date') ?></time>
        <a href="<?= get_field('link') ?>" target="_blank" class="link">Lire</a>
    </div>
</div>