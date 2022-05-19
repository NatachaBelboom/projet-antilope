<?php
/*
* Template Name: About Page Template
*/
?>
<?php get_header(); ?>

    <main>
        <section>
            <h2><span>Qu'est-ce que</span>NOair</h2>
            <div>
                <?= wp_get_attachment_image(get_field('image1'),'large', false, array('class' => '')); ?>
                <p>7 millions de victimes par an dans le monde !
                    La pollution de l'air est le facteur environnemental qui affecte le plus la santé de la population mondiale. Il est donc crucial de mesurer, réduire les émissions polluantes et informer le grand public. C'est l'objectif du projet NOair.</p>
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis distinctio ea eum libero, nesciunt sint sit. Autem natus nisi reprehenderit sed veniam voluptate! Dolorum ex quas reiciendis totam ut!</p>
                <?= wp_get_attachment_image(get_field('image2'),'large', false, array('class' => '')); ?>
            </div>

        </section>
        <section>
            <div>
                <h2><span>Découvrez</span>Nos modules</h2>
                <a href="<?= get_post_type_archive_link('product'); ?>">Les voir tous <img src="" alt="icone de flèche pointant vers la droite"></a>
            </div>
            <div>
                <?php if (($products = noair_get_products(3))->have_posts()) : while ($products->have_posts()) : $products->the_post();
                    noair_include('product', ['modifier' => 'index']);
                endwhile; else: ?>
                    <p class="projects__empty"></p>
                <?php endif; ?>
            </div>
        </section>
        <section>
            <h2><span>En collaboration avec</span>Nos partenaires</h2>
            <div>
                <div>
                    <img src="" alt="Logo de l'issep">
                    <p>L'ISSeP est l'Institut Scientifique de Service Public. Il exerce des activités scientifiques et techniques dans le domaine environnemental. L’ISSeP contribue à l’amélioration de notre environnement.</p>
                    <a href="https://www.issep.be/">Voir leur site</a>
                </div>

            </div>
        </section>
        <section>
            <h2>Contactez-nous</h2>
            <p>Nos produits vous plaisent? Envie d'avoir plus d'informations sur un module?
                N'hésitez pas à nous contacter !
            </p>
            <a href="<?= get_permalink(noair_get_template_page('template-contact')); ?>">Contactez-nous <img src="" alt="icone de flèche pointant vers la droite"></a>
        </section>
    </main>

<?php get_footer(); ?>