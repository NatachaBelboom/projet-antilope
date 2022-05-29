<?php
/*
* Template Name: About Page Template
*/
?>
<?php get_header(); ?>

    <main class="layout">
        <section class="layout__about about">
            <div class="titleHeader space">
                <h2 class="title" role="heading" aria-level="2"><span class="light">Qu'est-ce que </span>le projet NOair</h2>
                <span class="line"></span>
            </div>
            <div class="about__infos">
                <figure>
                    <?= wp_get_attachment_image(get_field('image1'),'large', false, array('class' => 'infos__img')); ?>
                </figure>
                <?= get_field('description1'); ?>
            </div>
            <div class="about__infos flexReverse">
                <?= get_field('description2'); ?>
                <figure>
                    <?= wp_get_attachment_image(get_field('image2'),'large', false, array('class' => 'infos__img')); ?>
                </figure>
            </div>

        </section>
        <section class="layout__products">
            <div class="layout__products--title">
                <div class="titleHeader">
                    <h2 class="title" role="heading" aria-level="2">
                        <span class="light">Découvrez </span>Nos modules phares
                    </h2>
                    <span class="line"></span>
                    <a href="<?= get_post_type_archive_link('product'); ?>" class="products__link link">
                        Les voir tous
                        <svg xmlns="http://www.w3.org/2000/svg" width="19.692" height="13.501" viewBox="0 0 19.692 13.501" class="arrow">
                            <title>Une flèche noire</title>
                            <desc>Une flèche noire pointant vers la droite</desc>
                            <path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H9.333A.911.911,0,0,0,8.426,18c0,.506.907.914.907.914H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-8.426 -11.252)"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="products__bestSeller bestSeller">
                <div class="products">
                    <?php if (($products = noair_get_products(3))->have_posts()) : while ($products->have_posts()) : $products->the_post();
                        noair_include('product', ['modifier' => 'index']);
                    endwhile;
                    else: ?>
                        <p class="products__empty">Il n'y a pas encore de modules a présenter</p>
                    <?php endif; ?>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
        <section class="layout__partners partners">
            <div class="titleHeader">
                <h2 class="title" role="heading" aria-level="2"><span class="light">En collaboration avec </span>Nos partenaires</h2>
                <span class="line"></span>
            </div>
            <div class="partners__container">
                <?php
                $partner = new WP_Query([
                    'post_type' => 'partner',
                ]);

                if (($partner->have_posts())) : while ($partner->have_posts()) : $partner->the_post();
                    noair_include('partner', ['modifier' => 'index']);
                endwhile; else: ?>
                    <p class="products__empty">Nous n'avons pas encore de partenaire</p>
                <?php endif; ?>
                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
            </div>
        </section>
        <section class="layout__contactSection contactSection">
            <?= wp_get_attachment_image(get_field('contact_logo'),'medium', false, array('class' => 'contactSection__img')); ?>
            <h2 class="contactSection__title" role="heading" aria-level="2">Contactez-nous</h2>
            <p>Nos produits vous <strong>plaisent</strong>? Envie d'avoir plus d'informations sur un <strong>module</strong>?</p>
            <a href="<?= get_permalink(noair_get_template_page('template-contact')); ?>" class="contactSection__link link">
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