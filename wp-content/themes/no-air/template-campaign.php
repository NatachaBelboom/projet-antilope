<?php
/*
* Template Name: Campaign Page Template
*/
$paginationLimit = 8;
?>

<?php get_header(); ?>
<main class="layout">
    <div class="container">
        <section class="layout__about slide-in campaign-grid">
            <div class="titleHeader space campaign-title">
                <h2 class="title" role="heading" aria-level="2"><span class="light">Nos différentes </span>campagnes
                </h2>
                <span class="line"></span>
            </div>

            <a href="<?= get_permalink(noair_get_template_page('template-about')); ?>" class="goBack campaign-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.692" height="13.501" viewBox="0 0 19.692 13.501" class="arrow-back">
                    <path id="arrow-back" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H9.333A.911.911,0,0,0,8.426,18c0,.506.907.914.907.914H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(28.118 24.753) rotate(180)"/>
                </svg>
                Retour
            </a>

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $campaign = new WP_Query([
                'post_type' => 'campagne',
                'order' => 'DESC',
                'posts_per_page' => $paginationLimit,
                'paged' => $paged,
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

            <div class="pagination">
                <?php $total_pages = $campaign->max_num_pages; ?>
                <?php if ($total_pages > 1){
                    $current_page = max(1, get_query_var('paged'));
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => '/page/%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text'    => __('« Précédent'),
                        'next_text'    => __('Suivant »'),
                    ));
                }?>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
        <section class="layout__contactSection contactSection slide-in">
            <?= get_the_post_thumbnail(
                    null,
                    'medium',
                    array('srcset' => wp_get_attachment_image_url( get_post_thumbnail_id(), 'neve-blog' ) . ' 480w, ' .
                                wp_get_attachment_image_url( get_post_thumbnail_id(), 'thumbnail' ) . ' 640w, ' .
                                wp_get_attachment_image_url( get_post_thumbnail_id(), 'MedLarge') . ' 960w', 'class' => 'contactSection__img'
                        )
            ); ?>
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
