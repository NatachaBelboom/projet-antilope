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
                <h2 class="title" role="heading" aria-level="2"><span class="light">NOair </span>dans la presse</h2>
                <span class="line"></span>
            </div>
            <div class=publications__container>
                <?php
                $publications = new WP_Query([
                    'post_type' => 'publication',
                    'meta_key' => 'date',
                    'orderby' => 'meta_value',
                ]);

                if (($publications->have_posts())) : while ($publications->have_posts()) : $publications->the_post();
                    noair_include('publication', ['modifier' => 'index']);
                endwhile;
                else: ?>
                    <p class="publication__empty">Il n'y a pas encore de publications a présenter</p>
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