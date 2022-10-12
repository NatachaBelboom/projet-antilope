<?php
/*
* Template Name: Publications Page Template
*/
?>

<?php get_header(); ?>
    <main class="pub">
        <div class="container">
            <section class="layout__publications publications slide-in">
                <div class="titleHeader space">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">Antilopinae </span>dans la presse</h2>
                    <span class="line"></span>
                </div>
                <div class=publications__container>
                    <?php
                    $the_query = new WP_Query([
                        'post_type' => 'publication',
                    ]);

                    ?>

                    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post() ?>

                        <?php if (get_field('presse')) : ?>

                            <?php noair_include('publication', ['modifier' => 'index']); ?>

                        <?php endif; ?>

                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </section>

            <section class="layout__publications publications slide-in">
                <div class="titleHeader space">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">Les articles </span>scientifiques
                    </h2>
                    <span class="line"></span>
                </div>
                <div class="">

                    <?php
                    $the_query = new WP_Query([
                        'meta_query' => array(
                            'post_type' => '',
                            array(
                                'key' => 'is_a_featured_area_of_focus',
                                'value' => '1',
                                'compare' => '=='
                            )
                        )
                    ]);

                    ?>

                    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post() ?>

                        <?php if (get_field('scientifique')) : ?>

                            <?php noair_include('science', ['modifier' => 'index']); ?>
                            <?php var_dump($the_query->found_posts); ?>

                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>

            </section>

            <section class="layout__contactSection contactSection slide-in">
                <?= wp_get_attachment_image(get_field('contact_logo'), 'medium', false, array('class' => 'contactSection__img')); ?>
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