<?php get_header(); ?>
<main class="layout">
    <div class="container">
        <section class="layout__products slide-in">
            <div class="titleHeader space">
                <h2 class="title" role="heading" aria-level="2"><span class="light">Découvrez </span>Nos modules</h2>
                <span class="line"></span>
            </div>
            <div class="products">
            <?php
            $products = new WP_Query([
                'post_type' => 'product',
                'order' => 'ASC'
            ]);

            if ($products->have_posts()) : while ($products->have_posts()) : $products->the_post(); ?>
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
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a pas de module pour l'instant</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            </div>
        </section>
        <section class="layout__contactSection contactSection slide-in">
            <?= wp_get_attachment_image(get_field('contact_logo'),'medium', false, array('class' => 'contactSection__img')); ?>
            <div>
                <h2 class="contactSection__title" role="heading" aria-level="2">Contactez-nous</h2>
                <p>Nos produits vous <strong>plaisent</strong>? Envie d'avoir plus d'informations sur un <strong>module</strong>?</p>
                <a href="<?= get_permalink(noair_get_template_page('template-contact')); ?>" class="contactSection__link link">
                    Envoyez-nous un mail
                    <?php noair_include('arrow-next'); ?>
                </a>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
