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
                <img <?= noair_the_img_attributes('image1', ['thumbnail', 'medium', 'large']); ?>>
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
                <div>
                    <img src="" alt="Logo de la section electronique">
                    <p>La section électronique et systèmes embarqués est une section faisant partie du master ingénieur industriel de l'HEPL.</p>
                    <a href="#">Voir leur site</a>
                </div>
                <div>
                    <img src="" alt="Logo de l'issep">
                    <p>La Haute Ecole de la Province de Liège est une haute école belge. Elle propose plusieurs formations de type différents dispersés dans 10 implantations à travers la province de Liège.</p>
                    <a href="https://www.hepl.be/">Voir leur site</a>
                </div>
            </div>
        </section>
        <section>
            <h2>Contactez-nous</h2>
            <p>Nos produits vous plaisent? Envie d'avoir plus d'informations sur un module?
                N'hésitez pas à nous contacter !
            </p>
            <a href="contact.php">Contactez-nous <img src="" alt="icone de flèche pointant vers la droite"></a>
        </section>
    </main>

<?php get_footer(); ?>