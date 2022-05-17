<?php
include 'header.php'
?>

<main>
    <div>
        <figure class="post__fig">
            <?= get_the_post_thumbnail(null, 'large', ['class' => 'post__thumb']) ?>
        </figure>
        <p>Identifier les types de pollution et en estimer le degré d'exposition pour la population:</p>
        <p>Un défi de santé publique que nous avons décidé de relever !</p>
        <a href="">Découvrez nos modules<img src="" alt="icone de flèche pointant vers la droite"></a>
    </div>
    <section>
        <div>
            <h2><span>Qu'est-ce que</span>Le projet NOair</h2>
            <p><?= get_field('about_text'); ?></p>
            <a href="">En savoir plus <span class="sro">sur NOair</span><img src="" alt="icone de flèche pointant vers la droite"></a>
        </div>
        <div>
            <?= get_field('about_video'); ?>
        </div>
    </section>
    <section>
        <div>
            <h2><span>Découvrez</span>Nos modules phares</h2>
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
        <div>
            <h2><span>Quels sont </span>Les polluants mesurés</h2>
            <?php var_dump(get_field('pollution_text')); ?>
            <p><?php echo get_field('pollution_text'); ?></p>
            <a href="">En savoir plus <span class="sro">sur les polluants</span><img src="" alt="icone de flèche pointant vers la droite"></a>
        </div>
        <!--<div>
            <img <?/*= noair_the_img_attributes('pollution_img', ['thumbnail', 'medium', 'large']); */?>>
        </div>-->
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

<?php
include 'footer.php'
?>
