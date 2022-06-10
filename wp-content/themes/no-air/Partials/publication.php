<div class="publications__card publication">
    <figure class="publication__fig">
        <?= get_the_post_thumbnail(null, 'large', ['class' => 'publication__img']) ?>
    </figure>
    <div class="publication__infos">
        <h3><?= the_title(); ?></h3>
        <div>
            <p class="date"><?= get_field('date') ?></p>
            <a href="<?= get_field('link') ?>" target="_blank" class="link">Lire</a>
        </div>
    </div>
</div>