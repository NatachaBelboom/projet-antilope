<?php
include 'header.php'
?>

    <main>
        <section>
            <h2><span>Le module</span><?php the_title(); ?></h2>
            <figure>
                <?= get_the_post_thumbnail(null, 'medium', ['class' => 'post__thumb']) ?>
            </figure>
            <div>
                <img src="" alt="image de l'interieur du module">
                <p><?= get_field('strong-title') ?></p>
                <p><?= get_field('description'); ?></p>
            </div>
            <div>
               <?php foreach (get_field('caracteristiques') as $key => $caracteristique): ?>
                    <p> <?= $key?>, <?= $caracteristique?> </p>
                <?php endforeach; ?>
            </div>


            <!--<div>
                <h3>Caractéristiques</h3>
                <ul role="list">
                    <li role="menuitem">Position (GPS)</li>
                    <li role="menuitem">1 Mesure par seconde</li>
                    <li role="menuitem">Stocké sur carte µSD</li>
                    <li role="menuitem">Mesure de T° et RH%</li>
                    <li role="menuitem">Alimentation par batterie USB</li>
                    <li role="menuitem">Faible consommation</li>
                    <li role="menuitem">Interface Bluetooth vers Smartphone</li>
                </ul>
            </div>
            <div>
                <h3>Les polluants mesurés</h3>
                <ul role="list">
                    <li role="menuitem">PM1-PM2,5</li>
                    <li role="menuitem">NO</li>
                    <li role="menuitem">NO2</li>
                    <li role="menuitem">O3</li>
                    <li role="menuitem">CO</li>
                    <li role="menuitem">CO2</li>
                </ul>
                <a href="../../../sans-wordpress/product-infos.php">Plus d'infos sur les polluants</a>
            </div>
        </section>-->
            <section>
                <h2><span>En collaboration avec</span>Nos partenaires</h2>
                <div>
                    <div>
                        <img src="" alt="Logo de l'issep">
                        <p>L'ISSeP est l'Institut Scientifique de Service Public. Il exerce des activités scientifiques
                            et techniques dans le domaine environnemental. L’ISSeP contribue à l’amélioration de notre
                            environnement.</p>
                        <a href="https://www.issep.be/">Voir leur site</a>
                    </div>
                    <div>
                        <img src="" alt="Logo de la section electronique">
                        <p>La section électronique et systèmes embarqués est une section faisant partie du master
                            ingénieur industriel de l'HEPL.</p>
                        <a href="#">Voir leur site</a>
                    </div>
                    <div>
                        <img src="" alt="Logo de l'issep">
                        <p>La Haute Ecole de la Province de Liège est une haute école belge. Elle propose plusieurs
                            formations de type différents dispersés dans 10 implantations à travers la province de
                            Liège.</p>
                        <a href="https://www.hepl.be/">Voir leur site</a>
                    </div>
                </div>
            </section>
            <section>
                <h2>Contactez-nous</h2>
                <p>Nos produits vous plaisent? Envie d'avoir plus d'informations sur un module?
                    N'hésitez pas à nous contacter !
                </p>
                <a href="../../../sans-wordpress/contact.php">Contactez-nous <img src=""
                                                                                  alt="icone de flèche pointant vers la droite"></a>
            </section>
    </main>

<?php
include 'footer.php'
?>