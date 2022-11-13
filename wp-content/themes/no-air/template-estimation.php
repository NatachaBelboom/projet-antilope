<?php
/*
* Template Name: Estimation Page Template
*/

$form_type = 'feedback_estimation_form';
?>

<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="layout layout__contact contact">
        <div class="container">
            <section class="slide-in">
                <div class="titleHeader space">
                    <h2 class="title" role="heading" aria-level="2"><span class="light">Faites une </span>estimation
                    </h2>
                    <span class="line"></span>
                </div>

                <div class="contact__container--estimation">
                    <div>
                        <p class="estimation_text">Vous souhaitez connaitre le taux de pollution dans votre commune grâce à nos modules ?</p>
                        <p class="estimation_text">Remplissez ce formulaire pour avoir une estimation de prix et vous recevrez une réponse dans
                            les plus brefs délais.</p>
                    </div>
                    <?php if (!isset($_SESSION[$form_type]) || !$_SESSION[$form_type]['success']) : ?>
                        <form action="<?= get_home_url(); ?>/wp-admin/admin-post.php" method="POST"
                              class="contact__form form--estimation">
                            <?php if (isset($_SESSION[$form_type]) && !$_SESSION[$form_type]['success']) : ?>
                                <p class="form__errors"><?= __('Oups ! Ce formulaire contient des erreurs, merci de les corriger.', 'noair'); ?></p>
                            <?php endif; ?>
                            <div class="flexContainer">
                                <div class="form__field">
                                    <label for="firstname"
                                           class="form__label"><?= __('Votre prénom *', 'noair'); ?></label>
                                    <input type="text"
                                           name="firstname"
                                           id="firstname"
                                           class="form__input"
                                           value="<?= noair_get_form_field_value('firstname', $form_type); ?>"
                                           placeholder="Prénom"/>
                                    <?= noair_get_form_field_error('firstname', $form_type); ?>
                                </div>
                                <div class="form__field">
                                    <label for="lastname" class="form__label"><?= __('Votre nom *', 'noair'); ?></label>
                                    <input type="text" name="lastname" id="lastname" class="form__input"
                                           value="<?= noair_get_form_field_value('lastname', $form_type); ?>"
                                           placeholder="Nom"/>
                                    <?= noair_get_form_field_error('lastname', $form_type); ?>
                                </div>
                            </div>
                            <div class="flexContainer">
                                <div class="form__field">
                                    <label for="email"
                                           class="form__label"><?= __('Votre adresse e-mail *', 'noair'); ?></label>
                                    <input type="email" name="email" id="email" class="form__input"
                                           value="<?= noair_get_form_field_value('email', $form_type); ?>"
                                           placeholder="Adresse mail"/>
                                    <?= noair_get_form_field_error('email', $form_type); ?>
                                </div>
                                <div class="form__field">
                                    <label for="phone"
                                           class="form__label"><?= __('Votre numéro de téléphone', 'noair'); ?></label>
                                    <input type="phone" name="phone" id="phone" class="form__input"
                                           value="<?= noair_get_form_field_value('phone', $form_type); ?>"
                                           placeholder="Numéro de téléphone"/>
                                    <?= noair_get_form_field_error('phone', $form_type); ?>
                                </div>
                            </div>
                            <div class="form__field">
                                <label for="ministation_number"
                                       class="form__label">Nombre de ministations *</label>
                                <input class="form__input"
                                       type="number"
                                       id="ministation_number"
                                       name="ministation_number"
                                       min="0"
                                       value="<?= noair_get_form_field_value('ministation_number', $form_type) ?>"
                                       placeholder="Nombre de ministation">
                                <?= noair_get_form_field_error('ministation_number', $form_type); ?>
                            </div>
                            <div class="form__field">
                                <label for="pollution" class="form__label">Les polluants *</label>
                                <?php
                                $pollution = new WP_Query([
                                    'post_type' => 'pollution',
                                    'order' => 'DESC',
                                ]);
                                $oldPollution = empty(noair_get_form_field_value('pollution', $form_type))
                                    ? []
                                    : noair_get_form_field_value('pollution', $form_type);

                                if (($pollution->have_posts())) : while ($pollution->have_posts()) : $pollution->the_post(); ?>
                                    <div class="checkbox__container">
                                        <input type="checkbox" id="pollution-<?= get_the_ID() ?>"
                                               name="pollution[]"
                                               value="<?= get_the_ID() ?>"
                                            <?= in_array(get_the_ID(), $oldPollution) ? 'checked' : '' ?>
                                        >
                                        <label for="pollution-<?= get_the_ID() ?>"
                                               class="form__label--smaller"><?= get_the_title() ?></label>
                                    </div>
                                <?php endwhile; else: ?>
                                <?php endif; ?>
                                <?= noair_get_form_field_error('pollution', $form_type); ?>
                            </div>
                            <div class="form__field">
                                <label for="date_start" class="form__label">Durée de la campagne *</label>
                                <div class="flexContainer--date">
                                    <div>
                                        <label for="date_start" class="form__label--smaller">Début</label>
                                        <input type="date" id="date_start" name="date_start"
                                               value="<?= noair_get_form_field_value('date_start', $form_type) ?>"
                                               class="form__input">
                                        <?= noair_get_form_field_error('date_start', $form_type); ?>
                                    </div>
                                    <div>
                                        <label for="date_end" class="form__label--smaller">Fin</label>
                                        <input type="date" id="date_end" name="date_end"
                                               value="<?= noair_get_form_field_value('date_end', $form_type) ?>"
                                               class="form__input">
                                        <?= noair_get_form_field_error('date_end', $form_type); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form__field">
                                <p class="form__label">Souhaitez-vous un rapport?</p>
                                <input type="radio"
                                       id="rapport-yes"
                                       name="rapport"
                                       value="1"
                                    <?= noair_get_form_field_value('rapport', $form_type) === '1' ? 'checked' : '' ?>
                                >
                                <label for="rapport-yes" class="form__label--smaller">Oui</label>

                                <input type="radio"
                                       id="rapport-no"
                                       name="rapport"
                                       value="0"
                                       <?= noair_get_form_field_value('rapport', $form_type) === '0' ? 'checked' : '' ?>
                                >
                                <label for="rapport-no" class="form__label--smaller">Non</label>

                                <?= noair_get_form_field_error('rapport', $form_type); ?>
                            </div>
                            <div class="form__field">
                                <p class="form__label">Souhaitez-vous une plateforme?</p>
                                <input type="radio"
                                       id="plateform-yes"
                                       name="plateform"
                                       value="1"
                                    <?= noair_get_form_field_value('plateform', $form_type) === '1' ? 'checked' : '' ?>
                                >
                                <label for="plateform-yes" class="form__label--smaller">Oui</label>

                                <input type="radio"
                                       id="plateform-no"
                                       name="plateform"
                                       value="0"
                                    <?= noair_get_form_field_value('plateform', $form_type) === '0' ? 'checked' : '' ?>
                                >
                                <label for="plateform-no" class="form__label--smaller">Non</label>

                                <?= noair_get_form_field_error('plateform', $form_type); ?>
                            </div>
                            <div class="form__field">
                                <label for="postal" class="form__label">Code postal *</label>
                                <input type="text" id="postal" name="postal"
                                       value="<?= noair_get_form_field_value('postal', $form_type) ?>"
                                       placeholder="4000"
                                       class="form__input">
                                <?= noair_get_form_field_error('postal', $form_type); ?>
                            </div>
                            <div class="form__field">
                                <label for="message" class="form__label"><?= __('Votre message *', 'noair'); ?></label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form__input"
                                          placeholder="Message"><?= noair_get_form_field_value('message', $form_type); ?></textarea>
                                <?= noair_get_form_field_error('message', $form_type); ?>
                            </div>

                            <div class="flexContainer">
                                <div class="form__actions">
                                    <?php wp_nonce_field('nonce_submit_estimation'); ?>
                                    <input type="hidden" name="action" value="submit_estimation_form"/>
                                    <button type="submit" class="form__button"><?= __('Envoyer', 'noair'); ?></button>
                                </div>
                            </div>
                        </form>
                    <?php else : ?>
                        <p class="form__feedback"><?= __('Merci de nous avoir contacté, à bientôt !', 'noair'); ?></p>
                    <?php endif; ?>
                    <?php unset($_SESSION['feedback_estimation_form']); ?>
                </div>
            </section>
        </div>
    </main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
