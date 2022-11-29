<?php
/*
* Template Name: Presse Page Template
*/
$paginationLimit = 15;
?>

<?php get_header(); ?>
    <main>
        <div class="container">
            <section class="layout__publications publications slide-in">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $the_query = new WP_Query([
                    'post_type' => 'publication',
                    'posts_per_page' => $paginationLimit,
                    'paged' => $paged,
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
                <a href="<?= get_permalink(noair_get_template_page('template-publications')); ?>" class="goBack">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.692" height="13.501" viewBox="0 0 19.692 13.501" class="arrow-back">
                        <path id="arrow-back" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H9.333A.911.911,0,0,0,8.426,18c0,.506.907.914.907.914H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(28.118 24.753) rotate(180)"/>
                    </svg>
                    Retour
                </a>
                <div class=publications__container>
                    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post() ?>
                        <?php noair_include('publication', ['modifier' => 'index']); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="pagination">
                    <?php $total_pages = $the_query->max_num_pages; ?>
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
                </div>
            </section>
            <?php wp_reset_postdata(); ?>
        </div>
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
    </main>
<?php get_footer(); ?>
