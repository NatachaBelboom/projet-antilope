<div class="partners__card card">
    <?= wp_get_attachment_image(get_field('logo'),'thumbnail', false, array('class' => 'card__img')); ?>
    <p><?= get_the_content(); ?></p>
    <a href="<?= get_field('link'); ?>" target="_blank">Voir leur site</a>
</div>