<?php
/*
* Template Name: Publications Page Template
*/

$limit = 2;
?>

<?php get_header(); ?>
    <main class="pub">
        <div class="container">
            <section class="layout__publications publications slide-in">
                <?php
                $the_query = new WP_Query([
                    'post_type' => 'publication',
                    'posts_per_page' => $limit,
                    'meta_query' => [
                        ['key' => 'presse',
                            'compare' => '==',
                            'value' => '1']
                    ],
                ]);
                ?>
                <div class="titleHeader space">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">Antilopinae </span>dans la presse</h2>
                    <span class="line"></span>
                </div>
                <div class=publications__container>
                    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post() ?>
                        <?php noair_include('publication', ['modifier' => 'index']); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php if ($the_query->found_posts > $limit): ?>
                    <a href="<?= get_permalink(noair_get_template_page('template-presse')); ?>">
                        Voir toutes les publications presses
                    </a>
                <?php endif; ?>
            </section>
            <?php wp_reset_postdata(); ?>

            <section class="layout__publications publications slide-in">
                <?php
                    $the_query = new WP_Query([
                        'post_type' => 'publication',
                        'posts_per_page' => $limit,
                        'meta_query' => [
                            ['key' => 'scientifique',
                                'compare' => '==',
                                'value' => '1']
                        ]
                    ]);
                ?>
                <div class="titleHeader space">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">Les articles </span>scientifiques
                    </h2>
                    <span class="line"></span>
                </div>
                <div class="science">
                    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post() ?>
                            <?php noair_include('science', ['modifier' => 'index']); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php if ($the_query->found_posts > $limit): ?>
                    <a href="<?= get_permalink(noair_get_template_page('template-scientifique')); ?>">
                        Voir toutes les publications scientifiques
                    </a>
                <?php endif; ?>
            </section>
            <?php wp_reset_postdata(); ?>

            <section class="layout__contactSection contactSection slide-in">
                <?= get_the_post_thumbnail(null, 'medium', ['class' => 'contactSection__img']) ?>
                <div>
                    <h2 class="contactSection__title" role="heading" aria-level="2">Contactez-nous</h2>
                    <p>Nos produits vous <strong>plaisent</strong>? Envie d'avoir plus d'informations sur un
                        <strong>module</strong>?
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