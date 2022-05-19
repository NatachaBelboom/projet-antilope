<?php get_header(); ?>

<main class="layout">
    <? /*= get_template_directory_uri(); */ ?>
    <div class="layout__landing landing">
        <figure class="landing__fig">
            <?= get_the_post_thumbnail(null, 'large', ['class' => 'landing__thumb']) ?>
        </figure>
        <p class="landing__catchTitle--first"><?= get_field('slogan1'); ?></p>
        <p class="landing__catchTitle--second"><?= get_field('slogan2'); ?></p>
        <a href="<?= get_post_type_archive_link('product'); ?>">
            Découvrez nos modules
            <svg xmlns="http://www.w3.org/2000/svg" width="19.692" height="13.501" viewBox="0 0 19.692 13.501">
                <path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H9.333A.911.911,0,0,0,8.426,18c0,.506.907.914.907.914H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-8.426 -11.252)"/>
            </svg>
        </a>
    </div>
    <section class="layout__about about">
        <div>
            <h2 class="title">
                <span class="light">Qu'est-ce que</span>Le projet NOair
            </h2>
            <p class="about__text"><?= get_field('about_text'); ?></p>
            <a href="<?= get_permalink(noair_get_template_page('template-about')); ?>">
                En savoir plus <span class="sro">sur NOair</span>
                <img src="" alt="icone de flèche pointant vers la droite">
            </a>
        </div>
        <div>
            <?= get_field('about_video'); ?>
        </div>
    </section>
    <section class="layout__products products">
        <div class="products__title">
            <h2 class="title">
                <span class="light">Découvrez</span>Nos modules phares
            </h2>
            <a href="<?= get_post_type_archive_link('product'); ?>">
                Les voir tous <img src="" alt="icone de flèche pointant vers la droite">
            </a>
        </div>
        <div class="products__bestSeller bestSeller">
            <?php if (($products = noair_get_products(3))->have_posts()) : while ($products->have_posts()) : $products->the_post();
                noair_include('product', ['modifier' => 'index']);
            endwhile;
            else: ?>
                <p class="products__empty">Il n'y a pas encore de modules a présenter</p>
            <?php endif; ?>
        </div>
    </section>
    <section class="layout__pollution pollution">
        <div>
            <h2 class="title">
                <span class="light">Quels sont </span>Les polluants mesurés
            </h2>
            <p class="pollution__text"><?= get_field('text-pollu'); ?></p>
            <a href="<?= get_permalink(noair_get_template_page('template-pollution')); ?>">
                En savoir plus <span class="sro">sur les polluants</span>
                <img src="" alt="icone de flèche pointant vers la droite">
            </a>
        </div>
        <div>
            <?= wp_get_attachment_image(get_field('pollution_img'),'large', false, array('class' => '')); ?>
        </div>
    </section>
    <section class="layout__partners partners">
        <h2 class="title"><span class="light">En collaboration avec</span>Nos partenaires</h2>
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

        </div>
    </section>

    <section class="layout__contact contact">
        <h2>Contactez-nous</h2>
        <p>Nos produits vous plaisent? Envie d'avoir plus d'informations sur un module?
            N'hésitez pas à nous contacter !
        </p>
        <a href="<?= get_permalink(noair_get_template_page('template-contact')); ?>">Contactez-nous <img src="" alt="icone de flèche pointant vers la droite"></a>
    </section>
</main>

<?php get_footer(); ?>
