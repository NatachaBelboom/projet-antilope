<?php
/*
* Template Name: Pollution Page Template
*/
?>

<?php get_header(); ?>

    <main>
        <h2><span>Quels sont </span>Les polluants mesurés</h2>
        <div>
            <h3>Filtres</h3>
            <div>
                <label for="product">Le module</label>
                <select name="products" id="">
                    <option value="default">---</option>
                    <option value="antilope">Antilope</option>
                    <option value="saiga">Saïga</option>
                    <option value="oryx">Oryx</option>
                    <option value="impala">Impala</option>
                    <option value="nyala">Nyala</option>
                </select>
            </div>
        </div>
        <ul role="list">
            <li role="menuitem">
                <p>PM1 -PM2,5</p>
                <p>description du polluant</p>
            </li>
            <li role="menuitem">
                <p>NO</p>
                <p>description du polluant</p>
            </li>
            <li role="menuitem">
                <p>NO2</p>
                <p>description du polluant</p>
            </li>
            <li role="menuitem">
                <p>O3</p>
                <p>description du polluant</p>
            </li>
            <li role="menuitem">
                <p>CO2</p>
                <p>description du polluant</p>
            </li>
        </ul>

        <section class="layout__products products">
            <div class="products__title">
                <h2 class="title"><span class="light">Découvrez</span>Nos modules phares</h2>
                <a href="<?= get_post_type_archive_link('product'); ?>">Les voir tous <img src=""
                                                                                           alt="icone de flèche pointant vers la droite"></a>
            </div>
            <div class="products__bestSeller bestSeller">
                <?php if (($products = noair_get_products(3))->have_posts()) : while ($products->have_posts()) : $products->the_post();
                    noair_include('product', ['modifier' => 'index']);
                endwhile;
                else: ?>
                    <p class="products__empty">Il n'y a pas encore de modules a présenter</p>
                <?php endif; ?>
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