<?php
/*
* Template Name: Contact Page Template
*/
?>


<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <main class="layout__contact contact">
        <h2 class="contact__title title" role="heading" aria-level="2"><span>N'hésitez pas à </span>Nous contacter</h2>
        <div class="contact__infos">
            <h3 role="heading" aria-level="3">Les informations</h3>
            <div itemscope itemtype="https://schema.org/Organization">
                <h4 role="heading" aria-level="4" itemprop="legalName">ISSeP</h4>
                <div itemprop="location" itemscope itemtype="https://schema.org/PostalAddress">
                    <p><span itemprop="streetAddress">Rue Chéra, 200 </span><span itemprop="postalCode">B-4000 </span><span itemprop="addressLocality">Liège</span></p>
                    <p>+32 4 229 83 11</p>
                    <a href="">le site web</a>
                </div>
            </div>
            <div itemscope itemtype="https://schema.org/Organization">
                <h4 role="heading" aria-level="4" itemprop="legalName">HEPL</h4>
                <div itemprop="location" itemscope itemtype="https://schema.org/PostalAddress">
                    <p><span itemprop="streetAddress">Campus Gloesener Quai Gloesener 6,</span><span itemprop="postalCode">4000 </span><span itemprop="addressLocality">Liège</span></p>
                    <p>+32 (0)4 279 55 20</p>
                    <a href="">le site web</a>
                </div>
            </div>
        </div>

        <?php if(! isset($_SESSION['feedback_contact_form']) || ! $_SESSION['feedback_contact_form']['success']) : ?>
            <form action="<?= get_home_url(); ?>/wp-admin/admin-post.php" method="POST" class="contact__form form">
                <?php if(isset($_SESSION['feedback_contact_form']) && ! $_SESSION['feedback_contact_form']['success']) : ?>
                    <p class="form__errors"><?= __('Oups ! Ce formulaire contient des erreurs, merci de les corriger.', 'noair'); ?></p>
                <?php endif; ?>
                <div class="form__field">
                    <label for="choice" class="form__label">Je voudrais... *</label>
                    <select name="choice" id="choice">
                        <option value="default">Choisissez</option>
                        <option value="productMoreInfo">Plus d'informations sur un module</option>
                        <option value="sectionMoreInfo">Plus d'informations sur la section électronique</option>
                        <option value="orderProduct">Commander un module</option>
                        <option value="other">autre</option>
                    </select>
                </div>
                <div class="form__field">
                    <label for="firstname" class="form__label"><?= __('Votre prénom *', 'noair'); ?></label>
                    <input type="text" name="firstname" id="firstname" class="form__input" value="<?= noair_get_contact_field_value('firstname'); ?>" placeholder="Prénom" />
                    <?= noair_get_contact_field_error('firstname'); ?>
                </div>
                <div class="form__field">
                    <label for="lastname" class="form__label"><?= __('Votre nom *', 'noair'); ?></label>
                    <input type="text" name="lastname" id="lastname" class="form__input" value="<?= noair_get_contact_field_value('lastname'); ?>" placeholder="Nom" />
                    <?= noair_get_contact_field_error('lastname'); ?>
                </div>
                <div class="form__field">
                    <label for="email" class="form__label"><?= __('Votre adresse e-mail *', 'noair'); ?></label>
                    <input type="email" name="email" id="email" class="form__input" value="<?= noair_get_contact_field_value('email'); ?>" placeholder="Adresse mail" />
                    <?= noair_get_contact_field_error('email'); ?>
                </div>
                <div class="form__field">
                    <label for="message" class="form__label"><?= __('Votre message *', 'noair'); ?></label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form__input" placeholder="Message"><?= noair_get_contact_field_value('message'); ?></textarea>
                    <?= noair_get_contact_field_error('message'); ?>
                </div>
                <div class="form__field">
                    <label for="rules" class="form__checkbox">
                        <input type="checkbox" name="rules" id="rules" class="form__checker" value="1">
                        <span class="form__checklabel"><?= str_replace(
                                ':conditions',
                                '<a href="#">' . __('conditions générales d’utilisation','noair') . '</a>',
                                __('J’ai lu et j’accepte les :conditions.', 'noair')
                            ); ?></span>
                    </label>
                    <?= noair_get_contact_field_error('rules'); ?>
                </div>
                <div class="form__actions">
                    <?php wp_nonce_field('nonce_submit_contact'); ?>
                    <input type="hidden" name="action" value="submit_contact_form" />
                    <button type="submit" class="form__button"><?= __('Envoyer', 'noair'); ?></button>
                </div>
            </form>
        <?php else : ?>
            <p class="form__feedback"><?= __('Merci de nous avoir contacté, à bientôt !', 'noair'); ?></p>
            <?php unset($_SESSION['feedback_contact_form']); ?>
        <?php endif; ?>

    </main>
<?php endwhile; endif; ?>

<?php
get_footer();
?>
