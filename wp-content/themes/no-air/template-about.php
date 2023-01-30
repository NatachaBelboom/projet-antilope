<?php
/*
* Template Name: About Page Template
*/
?>
<?php get_header(); ?>
    <main class="layout">
        <div class="container">
            <section class="layout__about about slide-in">
                <div class="titleHeader space">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">Qu'est-ce que </span>le projet
                        NOair
                    </h2>
                    <span class="line"></span>
                </div>
                <div class="about__infos">
                    <figure>
                        <?= wp_get_attachment_image(get_field('image1'), 'large', false, array('class' => 'infos__img')); ?>
                    </figure>
                    <?= get_field('description1'); ?>
                </div>
                <div class="about__infos flexReverse">
                    <?= get_field('description2'); ?>
                    <figure>
                        <?= wp_get_attachment_image(get_field('image2'), 'large', false, array('class' => 'infos__img')); ?>
                    </figure>
                </div>
            </section>
            <section class="layout__about slide-in campaign-grid">
                <div class="titleHeader space campaign-title">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">Nos différentes </span>campagnes
                    </h2>
                    <span class="line"></span>
                </div>

                <?php
                $limit = 2;
                $campaign = new WP_Query([
                    'post_type' => 'campagne',
                    'order' => 'DESC',
                    'posts_per_page' => $limit,
                ]);
                if (($campaign->have_posts())) : while ($campaign->have_posts()) : $campaign->the_post(); ?>
                    <div class="campaign">
                        <div>
                            <p class="campaign__title"><?= the_title(); ?></p>
                            <?= get_field('description'); ?>
                        </div>
                        <div class="campaign-imgContainer">
                            <?= wp_get_attachment_image(get_field('img'), 'large', false, array('class' => 'campaign__img')); ?>
                        </div>
                    </div>
                <?php endwhile; else: ?>
                <?php endif; ?>
                <?php if ($campaign->found_posts > $limit): ?>
                <a href="<?= get_permalink(noair_get_template_page('template-campaign')); ?>" class="publications__seeMore campaign-button">
                    Voir toutes les campagnes
                </a>
                <?php endif; ?>
            </section>
            <section class="layout__products slide-in">
                <div class="layout__products--title">
                    <div class="titleHeader">
                        <h2 class="title" role="heading" aria-level="2">
                            <span class="light">Découvrez </span>Nos modules phares
                        </h2>
                        <span class="line"></span>
                        <a href="<?= get_post_type_archive_link('product'); ?>" class="products__link link">
                            Les voir tous
                            <?php noair_include('arrow-next'); ?>
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
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
            <section class="layout__partners partners slide-in">
                <div class="titleHeader">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">En collaboration avec </span>Nos
                        partenaires</h2>
                    <span class="line"></span>
                </div>
                <div class="partners__container">
                    <?php
                    $partner = new WP_Query([
                        'post_type' => 'partner',
                    ]);

                    if (($partner->have_posts())) : while ($partner->have_posts()) : $partner->the_post();
                        noair_include('partner', ['modifier' => 'index']);
                    endwhile;
                    else: ?>
                        <p class="products__empty">Nous n'avons pas encore de partenaire</p>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </section>
            <section class="layout__contactSection contactSection slide-in">
                <?= wp_get_attachment_image(get_field('contact_logo'), 'medium', false, array('class' => 'contactSection__img')); ?>
                <div>
                    <h2 class="contactSection__title" role="heading" aria-level="2">Contactez-nous</h2>
                    <p>Nos produits vous <strong>plaisent</strong>? Envie d'avoir plus d'informations sur un <strong>module</strong>?
                    </p>
                    <a href="<?= get_permalink(noair_get_template_page('template-contact')); ?>"
                       class="contactSection__link link">
                        Envoyez-nous un mail
                        <?php noair_include('arrow-next'); ?>
                    </a>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>