<?php get_header(); ?>
    <main class="layout">
        <div class="container">
            <section class="layout__single single slide-in">
                <div class="titleHeader space">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">Le module </span><?php the_title(); ?></h2>
                    <span class="line"></span>
                    <?= wp_get_attachment_image(get_field('contact_logo'),[100, 100], false, array('class' => 'smallLogo')); ?>
                </div>
                <a href="<?= get_post_type_archive_link('product'); ?>" class="link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.692" height="13.501" viewBox="0 0 19.692 13.501" class="arrow-back">
                        <path id="arrow-back" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H9.333A.911.911,0,0,0,8.426,18c0,.506.907.914.907.914H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(28.118 24.753) rotate(180)"/>
                    </svg>
                    Retour vers les modules
                </a>
                <div class="single__presentation">
                    <?= wp_get_attachment_image(get_field('product-img'),'medium', false, array('class' => 'single__thumb')); ?>
                    <div>
                        <p class="single__strongTitle"><?= get_field('strong-title') ?></p>
                        <?= get_field('description'); ?>
                    </div>
                </div>
                <div class="single__caracteristic caracteristic">
                    <h3 class="caracteristic__title" role="heading" aria-level="3">Les caractéristiques</h3>
                    <div class="caracteristic__container">
                        <?php foreach (get_field('caracteristiques') as $key => $caracteristique): ?>
                            <?php if (!empty($caracteristique)): ?>
                                <div class="caracteristic__card">
                                    <p class="caracteristic__card--key"><?= ucfirst($key) ?></p>
                                    <p class="caracteristic__card--value"><?= $caracteristique ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <a href="https://www.wallonair.be/fr/" target="_blank" class="single__link link">Plus d'infos en temps réel</a>
                </div>
                <div class="single__pollution caracteristic">
                    <h3 class="pollution__title" role="heading" aria-level="3">Les polluants</h3>
                    <div class="caracteristic__container">
                        <?php foreach (get_field('polluants') as $pollution): ?>
                            <?php if (!empty($pollution)): ?>
                            <div class="pollution__card caracteristic__card">
                                <p class="__card--value"> <?= ucfirst($pollution) ?></p>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <a href="<?= get_permalink(noair_get_template_page('template-pollution')); ?>" class="link single__link">Plus d'infos sur les polluants</a>
                </div>
            </section>
            <section class="layout__partners partners slide-in">
                <div class="titleHeader">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">En collaboration avec </span>Nos partenaires</h2>
                    <span class="line"></span>
                </div>
                <div class="partners__container">
                    <?php
                    $partner = new WP_Query([
                        'post_type' => 'partner',
                    ]);

                    if (($partner->have_posts())) : while ($partner->have_posts()) : $partner->the_post();
                        noair_include('partner', ['modifier' => 'index']);
                    endwhile;
                    else: ?>
                        <p class="products__empty">Nous n'avons pas encore de partenaire</p>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </section>
            <section class="layout__contactSection contactSection slide-in">
                <?= wp_get_attachment_image(get_field('contact_logo'),'medium', false, array('class' => 'contactSection__img')); ?>
                <div>
                    <h2 class="contactSection__title" role="heading" aria-level="2">Contactez-nous</h2>
                    <p>Nos produits vous <strong>plaisent</strong>? Envie d'avoir plus d'informations sur un <strong>module</strong>?</p>
                    <a href="<?= get_permalink(noair_get_template_page('template-contact')); ?>" class="contactSection__link link">
                        Envoyez-nous un mail
                        <?php noair_include('arrow-next'); ?>
                    </a>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>