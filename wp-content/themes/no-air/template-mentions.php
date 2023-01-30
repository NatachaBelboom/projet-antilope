<?php
/*
* Template Name: Mentions Page Template
*/
?>
<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<main class="layout">
    <div class="container">
        <section class="layout__mentions mentions">
            <div class="titleHeader space">
                <h2 class="title" role="heading" aria-level="2"><span class="light">Les </span>mentions légales
                </h2>
                <span class="line"></span>
            </div>
            <div style="margin: 0 100px">
                <?= get_the_content(); ?>
            </div>
        </section>

    </div>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
