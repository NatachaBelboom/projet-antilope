<?php
/*
* Template Name: Pollution Page Template
*/
?>

<?php get_header(); ?>

    <main class="layout">
        <div class="container">
            <section class="layout__pollution pollution slide-in">
                <div class="titleHeader space">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">Quels sont </span>Les polluants
                        mesurés</h2>
                    <span class="line"></span>
                </div>
                <div class="pollution__container">
                    <div id="polluants" class="pollution__polluants">
                        <?php
                        $pollution = new WP_Query([
                            'post_type' => 'pollution',
                            'order' => 'DESC',
                        ]);

                        if (($pollution->have_posts())) : while ($pollution->have_posts()) : $pollution->the_post(); ?>
                            <?php $modules = get_field('modules_field'); ?>
                            <?php $firstElement =  $pollution->current_post;?>
                            <div class="polluant__container">
                                <h3 role="heading" aria-level="3" class="polluant-event <?= !$firstElement ? 'selected' : '' ?>"><?= the_title(); ?></h3>

                                <div class="polluant__card polluant-listener <?= !$firstElement ? 'selected' : '' ?>">
                                    <?= get_field('description'); ?>
                                    <div>
                                        <p class="product-measure">Les modules mesurant le <?= the_title(); ?></p>
                                        <?php if ($modules): ?>
                                            <div class="polluant__products">
                                                <?php foreach ($modules as $module): ?>
                                                    <div>
                                                        <?= get_the_post_thumbnail($module); ?>
                                                        <p class="polluant__products--title"><a href="<?= $module->guid ?>"><?= $module->post_title; ?></a></p>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; else: ?>
                        <?php endif; ?>
                    </div>
                </div>
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
            <section class="layout__contactSection contactSection slide-in">
                <?= get_the_post_thumbnail(null, 'large', ['class' => 'contactSection__img']); ?>
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