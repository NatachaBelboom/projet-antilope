<div class="products__container">
    <a href="<?= get_the_permalink(); ?>" class="product__link"></a>
    <?= wp_get_attachment_image(get_field('contact_logo'),'medium', false, array('class' => 'products__img')); ?>
    <h3 class="products__container--title" role="heading" aria-level="3"><?= the_title() ?></h3>
    <div class="hidden">
        <p class="products__container--meaning"><?= get_field('meaning') ?></p>
        <p class="link">
            En savoir plus <span class="sro">sur le module <?= the_title() ?></span>
            <?php noair_include('arrow-next'); ?>
        </p>
    </div>
</div>