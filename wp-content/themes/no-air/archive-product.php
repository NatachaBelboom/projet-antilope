<?php
include 'header.php'
?>

<main>
    <section>
        <h2><span>Découvrez</span>Nos modules</h2>
        <?php
        $products = new WP_Query([
            'post_type' => 'product',
        ]);

        if ($products->have_posts()) : while ($products->have_posts()) : $products->the_post(); ?>
            <div>
                <figure>
                    <?= get_the_post_thumbnail(null, 'medium', ['class' => 'post__thumb']) ?>
                </figure>
                <h3><?= the_title() ?></h3>
                <p><?= get_field('meaning') ?></p>
                <a href="<?= get_the_permalink(); ?>">En savoir plus <span class="sro">sur le module <?= the_title() ?></span><img src="" alt="icone de flèche pointant vers la droite"></a>
            </div>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a pas de module pour l'instant</p>
        <?php endif; ?>
    </section>
</main>

<?php
include 'footer.php'
?>
