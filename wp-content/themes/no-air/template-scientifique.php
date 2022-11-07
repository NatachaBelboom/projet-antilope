<?php
/*
* Template Name: Scientifique Page Template
*/
$paginationLimit = 15;

?>

<?php get_header(); ?>
<main>
    <div class="container">
        <section class="layout__publications publications slide-in">
            <?php
            $the_query = new WP_Query([
                'post_type' => 'publication',
                'posts_per_page' => $paginationLimit,
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
            <button onclick="history.back()">Retour</button>

            <div class="publications__container">
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post() ?>
                    <?php noair_include('science', ['modifier' => 'index']); ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
        <?php wp_reset_postdata(); ?>
    </div>
</main>
<?php get_footer(); ?>
