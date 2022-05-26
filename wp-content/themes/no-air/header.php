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
    <h1 role="heading" aria-level="1"><?= is_front_page() ? the_title() : wp_title('') ?></h1>
    <!-- mettre des span pour qualifier la page. si page de contact alors Contactez-moi span natacha belboom -->
    <!-- a faire en php -->
    <a href="/">
        <svg xmlns="http://www.w3.org/2000/svg" width="106.798" height="66.743" viewBox="0 0 106.798 66.743">
            <g id="Groupe_62" data-name="Groupe 62" transform="translate(0 0.234)">
                <text id="air" transform="translate(67.798 57.509)" fill="#161615" font-size="26" font-family="AquaGrotesque, Aqua Grotesque"><tspan x="0" y="0">air</tspan></text>
                <text id="NO" transform="translate(0 41.766)" fill="#161615" font-size="48" font-family="AquaGrotesque, Aqua Grotesque"><tspan x="0" y="0">NO</tspan></text>
            </g>
        </svg>
    </a>
    <nav class="header__nav nav" role="navigation">
        <h2 class="nav__title" role="heading" aria-level="2">
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
