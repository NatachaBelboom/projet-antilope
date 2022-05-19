<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Site répertoriant des modules qui mesurent la qualité de l'air">
    <meta name="keywords" content="mesures, pollution, qualité, air, système embarqué, capteurs">
    <link rel="stylesheet" href="style.css">


    <?php wp_head(); ?>

    <title><?= is_front_page() ? 'NOair, mesure la qualité de l\'air' : wp_title('NOair |') ?></title>
</head>
<body>
<header>
    <h1><?= the_title() ?></h1>
    <!-- mettre des span pour qualifier la page. si page de contact alors Contactez-moi span natacha belboom -->
    <!-- a faire en php -->
    <a href="">
        <img src="/" alt="logo">
    </a>
    <nav class="header__nav nav" role="navigation">
        <h2 class="nav__title">
            <?= __('Navigation principale', 'noair') ?>
        </h2>
        <ul class="nav__container">
            <?php foreach (noair_get_menu_items('primary') as $link): ?>  <!--la fonction renvoie un tableau d'item-->
                <li class="<?= $link->getBemClasses('nav__item') ?>">
                    <a href="<?= $link->url ?>" class="nav__link"><?= $link->label ?></a>
                    <?php if($link->hasSubItems()): ?>
                        <ul class="nav__subitems">
                            <?php foreach ($link->subitems as $sub): ?>
                                <li class="<?= $link->getBemClasses('nav__subitem') ?>">
                                    <a href="<?= $sub->url ?>" class="nav__link"><?= $sub->label ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--<div class="nav__languages">
            <?php /*foreach(pll_the_languages(['raw' => true]) as $code => $locale): */?>
                <a href="<?/*= $locale['url'] */?>" title="<?/*= $locale['name'] */?>" lang="<?/*= $locale['locale'] */?>" hreflang="<?/*= $locale['locale'] */?>" class="nav__locale">
                    <?/*= $code */?>
                </a>
            <?php /*endforeach; */?>
        </div>
        <div class="nav__cta">
            <a href="<?/*= get_permalink(dw_get_template_page('template-contact')) */?>" class="nav__contact"><?/*= __('Prendre contact', 'dw') */?></a>
        </div>-->
    </nav>
</header>
