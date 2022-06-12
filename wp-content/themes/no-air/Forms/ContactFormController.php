<?php

class ContactFormController extends BaseFormController
{
    protected function getNonceKey() : string
    {
        return 'nonce_submit_contact';
    }

    protected function getSanitizableAttributes() : array
    {
        return [
            'firstname' => TextSanitizer::class,
            'lastname' => TextSanitizer::class,
            'email' => EmailSanitizer::class,
            'choice' => TextSanitizer::class,
            'message' => TextSanitizer::class,
            'rules' => TextSanitizer::class,
        ];
    }

    protected function getValidatableAttributes() : array
    {
        return [
            'choice' => [RequiredValidator::class],
            'firstname' => [RequiredValidator::class],
            'lastname' => [RequiredValidator::class],
            'email' => [RequiredValidator::class, EmailValidator::class],
            'message' => [RequiredValidator::class],
            'rules' => [AcceptedValidator::class],
        ];
    }

    protected function redirectWithErrors($errors)
    {

        // C'est pas OK, on place les erreurs de validation dans la session
        $_SESSION['feedback_contact_form'] = [
            'success' => false,
            'data' => $this->data,
            'errors' => $errors,
        ];

        // On redirige l'utilisateur vers le formulaire pour y afficher le feedback d'erreurs.
        return wp_safe_redirect(($this->data['_wp_http_referer'] ?? '') . '#contact', 302);
    }

    protected function handle()
    {
        // Traitement
        $id = wp_insert_post([
            'post_title' => 'Message de ' . $this->data['firstname'] . ' ' . $this->data['lastname'],
            'post_type' => 'message',
            'post_content' => $this->data['message'],
            'post_status' => 'publish'
        ]);


        $choice   = '';
        $email     = '';
        $sender    = $this->data[ 'email' ];
        $firstname = $this->data[ 'firstname' ];
        $lastname  = $this->data[ 'lastname' ];
        $message = $this->data['message'];


        switch ($_POST['choice']){
            case 'productMoreInfo':
                $subject = 'avoir plus d\'infos sur un module';
                $email = 'natacha.belboom@hotmail.com';
                break;
            case 'sectionMoreInfo':
                $subject = 'avoir plus d\'infos sur la section électronique et systèmes embarqués';
                $email = 'natacha.belboom@student.hepl.com';
                break;
            case 'orderProduct':
                $subject = 'commander un module';
                $email = 'natacha.belboom@hotmail.com';
                break;
            case 'other':
                $subject = 'renseignement';
                $email = 'natacha.belboom@hotmail.com';
                break;
        }

        $content = 'Bonjour, un nouveau message de contact a été envoyé.';
        $content .= 'de ' . ucfirst( $firstname ) . ' ' . strtoupper( $lastname );
        $content .= 'A propos de ' . $choice ;
        $content .= 'email : ' . $sender;
        $content .= 'Message : ' . $message;

        // Envoyer l'email à l'admin
        wp_mail($email, 'Nouveau message. Souhait : '.$subject, $content);
    }

    protected function redirectWithSuccess()
    {
        // Ajouter le feedback positif à la session
        $_SESSION['feedback_contact_form'] = [
            'success' => true,
        ];

        return wp_safe_redirect($this->data['_wp_http_referer'] . '#contact', 302);
    }
}


