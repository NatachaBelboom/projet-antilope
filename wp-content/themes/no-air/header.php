<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Site répertoriant des modules qui mesurent la qualité de l'air">
    <meta name="keywords" content="mesures, pollution, qualité, air, système embarqué, capteurs">
    <link rel="stylesheet" type="text/css" href="<?= noair_mix('css/style.css'); ?>">
    <?php wp_head(); ?>

    <title><?= is_front_page() ? 'NOair, mesure la qualité de l\'air' : wp_title('NOair |') ?></title>
</head>
<body>
<header>
    <div class="container header">
        <h1 role="heading" aria-level="1" class="sro"><?= is_front_page() ? the_title() : wp_title('') ?></h1>
        <a href="/" class="header__logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="81.2" height="50.94" viewBox="0 0 106.798 66.743">
                <g id="Groupe_62" data-name="Groupe 62" transform="translate(0 0.234)">
                    <text id="air" transform="translate(67.798 57.509)" fill="#161615" font-size="26"
                          font-family="AquaGrotesque, Aqua Grotesque">
                        <tspan x="0" y="0">air</tspan>
                    </text>
                    <text id="NO" transform="translate(0 41.766)" fill="#161615" font-size="48"
                          font-family="AquaGrotesque, Aqua Grotesque">
                        <tspan x="0" y="0">NO</tspan>
                    </text>
                </g>
            </svg>
        </a>
        <nav class="header__nav nav" role="navigation">
            <h2 class="nav__title sro" role="heading" aria-level="2">
                <?= __('Navigation principale', 'noair') ?>
            </h2>
            <ul class="nav__container">
                <?php foreach (noair_get_menu_items('primary') as $link): ?>
                    <li class="<?= $link->getBemClasses('nav__item') ?>">
                        <a href="<?= $link->url ?>" class="nav__link"><?= $link->label ?></a>
                    </li>
                <?php endforeach; ?>
                <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" width="500" class="svg-menu"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 749.2 857.2" xml:space="preserve">
                    <path class="st0" d="M622.8,639.1c2.1-1.1,3.7-1.9,5.9-3.1c4.5,5.8,8.9,11.6,14,18.2c-32.1,24.4-64,48.5-96.1,72.9
	c-4.8-6.3-9.2-12.1-13.9-18.3c1.5-1.6,2.9-3,4-4.2c-4.7-6.8-9.2-13.2-13.7-19.6c-7.4-10.4-6.2-21,3.9-28.8
	c17.5-13.5,35.1-26.8,52.7-40.1c10-7.5,21-5.9,28.8,4C613.2,626.3,617.7,632.4,622.8,639.1z"/>
                    <path class="st0" d="M562.9,604.7c-4.5-7.7-9.7-15-14.7-22.4c-3.9-5.8-7.9-11.5-11.8-17.3c-2.7-4-5.4-8-8.2-12
	c-4.4-6.5-8.9-13-13.3-19.5c-1.7-2.5-3.5-5-5.3-7.4c-3.5-4.9-7.1-9.9-10.7-14.8c-2.6-3.6-5.2-7.3-7.9-10.9c-3-4-6-7.9-9-11.8
	c-0.6-0.9-1.3-1.7-1.9-2.6c-1-3.8-1.9-7.7-2.6-11.6c-2.1-11.4-5.8-22.1-15-29.1c-10.1-7.7-16-18-22-28.4
	c-12.3-21-30.9-35.8-51.9-43.2c-0.2-0.2-0.4-0.4-0.6-0.6c-2.2-2.7-4.4-5.4-6.7-8c-2.7-3-5.6-5.9-8.4-8.9c-0.2-0.2-0.3-0.3-0.5-0.5
	c-2.5-2.9-4.8-6-7.4-8.8c-3.5-3.7-7.1-7.3-10.7-10.9c-0.2-0.2-0.3-0.3-0.5-0.5c-2.9-3.3-5.6-6.8-8.6-10c-3.3-3.5-7.1-6.6-10.3-10.4
	c-4.4-5.2-10.1-9.1-14.5-14.4c-3.8-4.5-8.6-8-12.6-12.4c-5.1-5.7-11-10.8-16.6-16.2c-8.3-8.1-17.4-15.4-26.1-23
	c-2.5-2.2-4.9-4.5-7.4-6.7c-10.3-9-20.5-18-30.8-27c-0.3-0.3-0.7-0.6-1.1-0.9c-3.7-2.7-7.6-5.3-11.2-8.1c-4-3-7.8-6.3-11.6-9.4
	c-0.1-0.1-0.2-0.1-0.3-0.2c-4.1-3-8.2-6-12.2-9.1c-0.4-0.3-0.7-0.6-1.1-0.9c-3.1-2.1-6.2-4.1-9.2-6.3c-3.2-2.3-6.2-4.9-9.4-7.3
	c-0.3-0.2-0.5-0.4-0.8-0.6c-2.6-1.7-5.3-3.4-7.9-5.2c-3.7-2.5-7.4-5.2-11.1-7.7c-2.3-1.6-4.8-2.9-7.1-4.5c-3.3-2.1-6.5-4.4-10.1-6.8
	c-3.2,4.1-6.2,8-9.3,12c0.7,0.7,1.1,1.4,1.8,1.8c1.9,1.4,3.9,2.7,5.7,4.2c3.2,2.5,6,5.4,9.5,7.7c4.7,3.1,9,7,13.2,10.8
	c10.5,9.4,20.8,18.9,31.2,28.3c2.1,1.9,3.8,4.2,5.3,6.6c0.4,0.6,0.7,1.2,1.2,1.6c6.3,6.1,12.6,12.2,18.8,18.3
	c2.7,2.7,5.4,5.5,7.9,8.4c2.5,2.9,4.9,5.9,7.4,8.8c2.8,3.1,5.7,6.1,8.6,9.1c0.2,0.2,0.3,0.3,0.4,0.5c2,2.5,3.9,5,5.9,7.4
	c2.9,3.5,5.9,6.8,8.7,10.3c2.8,3.4,5.2,7,8,10.4c3.9,4.8,8,9.4,11.9,14.3c4.2,5.2,8.2,10.4,12.3,15.6c1.1,1.4,2.3,2.8,3.3,4.3
	c2.5,3.6,4.9,7.3,7.3,10.9c4.9,7.1,9.9,14.2,14.8,21.4c0.4,0.5,0.3,1.3,0.5,2.4c-1.7-1.4-3-2.6-4.4-3.6c-2.5-1.7-5.1-3.3-7.6-5.1
	c-2.6-1.8-5-3.9-7.6-5.7c-2-1.5-4-2.9-6.1-4.3c-2.7-1.8-5.5-3.5-8.1-5.4c-2.6-1.8-5-3.8-7.6-5.7c-1.9-1.4-3.9-2.7-5.8-4.1
	c-2.6-1.8-5.3-3.4-7.9-5.2c-2-1.4-4-2.8-6.2-4.3c-4.2,4.6-8.1,8.8-11.9,13.2c-0.5,0.5-0.7,1.4-0.7,2.2c-0.1,6.3,0.6,12.5,2.2,18.6
	c2.4,9,6,17.6,11.2,25.3c1,1.5,2.1,2.9,3.2,4.3c2.8,3.5,5.5,7.2,8.6,10.4c3.8,3.9,8,7.4,12.1,11.1c0.7,0.6,1.4,1.2,2.1,1.7
	c1.1,0.7,2.2,1.4,3.2,2.1c-18,25.7-23.3,59.7-11.6,90.8c2,5.4,4.7,8,10,8.3c-1.3,5.9-2.2,11.8-2.9,17.7c-1.1,9.5-1.2,19.2-1.7,28.8
	c-0.1,2.1,0,4.4-0.5,6.4c-1,4.2-1.6,8.4-3,12.5c-2.6,7.5-4.6,15.2-6.9,22.8c-0.2,0.5-0.3,1.1-0.5,1.6c-4.1,7.4-8.1,14.8-12.2,22.1
	c-1.3,2.2-3,4.2-4.4,6.4c-1.8,2.7-3.4,5.7-5.6,8c-3.2,3.5-6.2,7.1-9.6,10.4l114.9,104.8c0-0.1,0.1-0.2,0.1-0.3
	c2.1-5.2,3.8-10.6,5.7-16c1-2.9,1.9-5.8,2.9-8.7c2.1-6,4.6-11.8,6.4-17.8c6.6-22.2,12.8-44.5,18.3-67.1c0.1-0.4,0.3-0.9,0.3-1.3
	c1-5.7,1.9-11.4,3-17c2.2-11.7,4.5-23.3,6.9-34.9c0.2-1.2,0.7-2.3,1.2-3.9c5.9,1.8,11.7,3.6,17.4,5.4c0.7,0.4,1.5,0.7,2.4,0.8
	c2,0.6,4,1.3,6,1.9c4.8,1.6,9.6,3.5,14.2,5.4c7,2.9,14,5.8,20.8,9c8.3,4,16.6,8.2,24.8,12.4c4.2,2.2,8.2,4.6,12.3,7
	c3.3,1.9,6.7,3.7,9.9,5.7c5.8,3.6,11.6,7.4,17.8,10.2c10.7,5.4,30.7-15.2,41.9-24.4C559.7,612.9,564.9,609.3,562.9,604.7z
	 M456.3,495.6c-10.9,12-29.4,12.8-41.4,1.9c-12-10.9-12.8-29.4-1.9-41.4c10.9-12,29.4-12.8,41.4-1.9
	C466.3,465.1,467.2,483.7,456.3,495.6z"/>
                </svg>
            </ul>

            <div class="nav__burgerMenu burgerMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>
</header>
