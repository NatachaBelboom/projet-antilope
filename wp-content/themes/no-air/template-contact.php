<?php
/*
* Template Name: Contact Page Template
*/
$form_type = 'feedback_contact_form';
?>
<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <main class="layout layout__contact contact">
        <div class="container">
            <section class="slide-in">
                <div class="titleHeader space">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">N'hésitez pas à </span>nous contacter</h2>
                    <span class="line"></span>
                </div>
                <div class="contact__container">
                    <div class="contact__infos">
                        <h3 role="heading" aria-level="3" class="sro">Les informations</h3>
                        <div itemscope itemtype="https://schema.org/Organization">
                            <h4 role="heading" aria-level="4" itemprop="legalName">L'ISSeP</h4>
                            <p class="contact__infos--whyContact">Pour vos questions concernant <span class="color">l’organisation d’une campagne de mesure de surveillance de la qualité de l’air</span> ou tout type de <span class="color">développement en électronique</span>, contactez-nous.</p>
                            <div itemprop="location" itemscope itemtype="https://schema.org/PostalAddress" class="infos__container">
                                <p class="address"><span itemprop="streetAddress">Rue Chéra, 200 </span><span itemprop="postalCode">4000 </span><span itemprop="addressLocality">Liège</span></p>
                                <div>
                                    <p><a href="tel:+32 4 229 83 11" class="not_link">+32 4 229 83 11</a></p>
                                    <a href="https://www.issep.be/">www.issep.be</a>
                                </div>
                            </div>
                        </div>
                        <div itemscope itemtype="https://schema.org/Organization">
                            <h4 role="heading" aria-level="4"><span itemprop="legalName">L'HEPL <span class="sro">Haute Ecole de la province de Liège</span></span> - option électronique et systèmes embarqués</h4>
                            <p class="contact__infos--whyContact">Pour vos questions concernant tout type de <span class="color">développement en électronique</span> ou sur les études du <span class="color">Master en Sciences de l'ingénieur industriel finalité électronique et systèmes embarqués</span>, contactez-nous.</p>
                            <div itemprop="location" itemscope itemtype="https://schema.org/PostalAddress" class="infos__container">
                                <p class="address"><span itemprop="streetAddress">Quai Gloesener, 6 </span><span itemprop="postalCode">4000 </span><span itemprop="addressLocality">Liège</span></p>
                                <div>
                                    <p><a href="tel:+32 4 279 55 20" class="not_link">+32 4 279 55 20</a></p>
                                    <a href="https://www.ingehepl.be" target="_blank">www.ingehepl.be</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(! isset($_SESSION[$form_type]) || ! $_SESSION[$form_type]['success']) : ?>
                        <form action="<?= get_home_url(); ?>/wp-admin/admin-post.php" method="POST" class="contact__form form">
                            <?php if(isset($_SESSION[$form_type]) && ! $_SESSION[$form_type]['success']) : ?>
                                <p class="form__errors"><?= __('Oups ! Ce formulaire contient des erreurs, merci de les corriger.', 'noair'); ?></p>
                            <?php endif; ?>
                            <div class="form__field">
                                <label for="choice" class="form__label">Je voudrais... *</label>
                                <select name="choice" id="choice">
                                    <option value="">---</option>
                                    <option value="productMoreInfo">Plus d'informations sur un module</option>
                                    <option value="sectionMoreInfo">Plus d'informations sur la section électronique</option>
                                    <option value="orderProduct">Commander un module</option>
                                    <option value="other">autre</option>
                                </select>
                                <?= noair_get_form_field_error('choice', $form_type); ?>
                            </div>
                            <div class="flexContainer">
                                <div class="form__field">
                                    <label for="firstname" class="form__label"><?= __('Votre prénom *', 'noair'); ?></label>
                                    <input type="text" name="firstname" id="firstname" class="form__input" value="<?= noair_get_form_field_value('firstname', $form_type); ?>" placeholder="Prénom" />
                                    <?= noair_get_form_field_error('firstname', $form_type); ?>
                                </div>
                                <div class="form__field">
                                    <label for="lastname" class="form__label"><?= __('Votre nom *', 'noair'); ?></label>
                                    <input type="text" name="lastname" id="lastname" class="form__input" value="<?= noair_get_form_field_value('lastname', $form_type); ?>" placeholder="Nom" />
                                    <?= noair_get_form_field_error('lastname', $form_type); ?>
                                </div>
                            </div>
                            <div class="flexContainer">
                                <div class="form__field">
                                    <label for="email" class="form__label"><?= __('Votre adresse e-mail *', 'noair'); ?></label>
                                    <input type="email" name="email" id="email" class="form__input" value="<?= noair_get_form_field_value('email', $form_type); ?>" placeholder="Adresse mail" />
                                    <?= noair_get_form_field_error('email', $form_type); ?>
                                </div>
                                <div class="form__field">
                                    <label for="phone" class="form__label"><?= __('Votre numéro de téléphone', 'noair'); ?></label>
                                    <input type="phone" name="phone" id="phone" class="form__input" value="<?= noair_get_form_field_value('phone', $form_type); ?>" placeholder="Numéro de téléphone" />
                                    <?= noair_get_form_field_error('phone', $form_type); ?>
                                </div>
                            </div>
                            <div class="form__field">
                                <label for="message" class="form__label"><?= __('Votre message *', 'noair'); ?></label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form__input" placeholder="Message"><?= noair_get_form_field_value('message', $form_type); ?></textarea>
                                <?= noair_get_form_field_error('message', $form_type); ?>
                            </div>
                            <div class="flexContainer">
                                <div class="form__field">
                                    <label for="rules" class="form__checkbox">
                                        <input type="checkbox" name="rules" id="rules" class="form__checker" value="1">
                                        <span class="form__checklabel">
                                            J'ai lu et j'accepte les <a href="<?= get_permalink(noair_get_template_page('template-mentions')); ?>">conditions générales d'utilisation.</a>
                                        </span>
                                    </label>
                                    <?= noair_get_form_field_error('rules', $form_type); ?>
                                </div>
                                <div class="form__actions">
                                    <?php wp_nonce_field('nonce_submit_contact'); ?>
                                    <input type="hidden" name="action" value="submit_contact_form" />
                                    <button type="submit" class="form__button"><?= __('Envoyer', 'noair'); ?></button>
                                </div>
                            </div>
                        </form>
                    <?php else : ?>
                        <p class="form__feedback"><?= __('Merci de nous avoir contacté, à bientôt !', 'noair'); ?></p>
                    <?php endif; ?>
                    <?php unset($_SESSION['feedback_contact_form']); ?>
                </div>
            </section>
        </div>
    </main>
<?php endwhile; endif; ?>

<?php
get_footer();
?>
