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
                <p><?= get_field('long-title'); ?></p>
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
                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
            </div>
        </section>
        <section class="layout__contactSection contactSection">
            <?= wp_get_attachment_image(get_field('contact_logo'),'medium', false, array('class' => 'contactSection__img')); ?>
            <h2 class="contactSection__title ">Contactez-nous</h2>
            <p>Nos produits vous <strong>plaisent</strong>? Envie d'avoir plus d'informations sur un <strong>module</strong>?</p>
            <a href="<?= get_permalink(noair_get_template_page('template-contact')); ?>">
                Envoyez-nous un mail
                <svg xmlns="http://www.w3.org/2000/svg" width="19.692" height="13.501" viewBox="0 0 19.692 13.501">
                    <title>Une flèche noire</title>
                    <desc>Une flèche noire pointant vers la droite</desc>
                    <path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H9.333A.911.911,0,0,0,8.426,18c0,.506.907.914.907.914H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-8.426 -11.252)"/>
                </svg>
            </a>
        </section>

    </main>

<?php get_footer(); ?>