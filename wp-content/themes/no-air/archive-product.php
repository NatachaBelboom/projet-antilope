<?php get_header(); ?>
<main class="layout">
    <section class="layout__products">
        <h2 class="title" role="heading" aria-level="2"><span class="light">Découvrez </span>Nos modules</h2>
        <div class="products">
        <?php
        $products = new WP_Query([
            'post_type' => 'product',
            'order' => 'ASC'
        ]);

        if ($products->have_posts()) : while ($products->have_posts()) : $products->the_post(); ?>
            <div class="products__container">
                <?= wp_get_attachment_image(get_field('contact_logo'),'medium', false, array('class' => 'products__img')); ?>
                <h3 class="products__container--title" role="heading" aria-level="3"><?= the_title() ?></h3>
                <p class="products__container--meaning"><?= get_field('meaning') ?></p>
                <a href="<?= get_the_permalink(); ?>" class="link product__link">En savoir plus <span class="sro">sur le module <?= the_title() ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.692" height="13.501" viewBox="0 0 19.692 13.501" class="arrow">
                        <title>Une flèche noire</title>
                        <desc>Une flèche noire pointant vers la droite</desc>
                        <path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H9.333A.911.911,0,0,0,8.426,18c0,.506.907.914.907.914H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-8.426 -11.252)"/>
                    </svg>
                </a>
            </div>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a pas de module pour l'instant</p>
        <?php endif; ?>
        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
        </div>
    </section>

    <section class="layout__pollution pollution">
        <div>
            <h2 class="title" role="heading" aria-level="2">
                <span class="light">Quels sont </span>Les polluants mesurés
            </h2>
            <p class="pollution__text"></p>
            <a href="<?= get_permalink(noair_get_template_page('template-pollution')); ?>">
                En savoir plus <span class="sro">sur les polluants</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="19.692" height="13.501" viewBox="0 0 19.692 13.501">
                    <title>Une flèche noire</title>
                    <desc>Une flèche noire pointant vers la droite</desc>
                    <path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H9.333A.911.911,0,0,0,8.426,18c0,.506.907.914.907.914H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-8.426 -11.252)"/>
                </svg>
            </a>
        </div>
        <div>
            <?= wp_get_attachment_image(get_field('pollution_img'),'large', false, array('class' => '')); ?>
        </div>
    </section>
    <section class="layout__contactSection contactSection">
        <?= wp_get_attachment_image(get_field('contact_logo'),'medium', false, array('class' => 'contactSection__img')); ?>
        <h2 class="contactSection__title" role="heading" aria-level="2">Contactez-nous</h2>
        <p>Nos produits vous <strong>plaisent</strong>? Envie d'avoir plus d'informations sur un <strong>module</strong>?</p>
        <a href="<?= get_permalink(noair_get_template_page('template-contact')); ?>">
            Envoyez-nous un mail
            <svg xmlns="http://www.w3.org/2000/svg" width="19.692" height="13.501" viewBox="0 0 19.692 13.501">
                <title>Une flèche noire</title>
                <desc>Une flèche noire pointant vers la droite</desc>
                <path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H9.333A.911.911,0,0,0,8.426,18c0,.506.907.914.907.914H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-8.426 -11.252)"/>
            </svg>
        </a>
    </section>
</main>

<?php get_footer(); ?>
