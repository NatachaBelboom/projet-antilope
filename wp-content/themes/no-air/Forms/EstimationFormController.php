<?php

class EstimationFormController extends BaseFormController
{
    protected function getNonceKey() : string
    {
        return 'nonce_submit_estimation';
    }

    protected function getSanitizableAttributes() : array
    {
        return [
            'firstname' => TextSanitizer::class,
            'lastname' => TextSanitizer::class,
            'email' => EmailSanitizer::class,
            'phone' => TextSanitizer::class,
            'ministation_number' => TextSanitizer::class,
            'date_start' => TextSanitizer::class,
            'date_end' => TextSanitizer::class,
            'rapport' => TextSanitizer::class,
            'plateform' => TextSanitizer::class,
            'postal' => TextSanitizer::class,
            'message' => TextSanitizer::class,
        ];
    }

    protected function getValidatableAttributes() : array
    {
        return [
            'firstname' => [RequiredValidator::class, AlphaValidator::class],
            'lastname' => [RequiredValidator::class, AlphaValidator::class],
            'email' => [RequiredValidator::class, EmailValidator::class],
            'ministation_number' => [RequiredValidator::class, AbsoluteNumberValidator::class],
            'pollution' => [RequiredValidator::class, PollutionCheckboxValidator::class],
            'date_start' => [RequiredValidator::class, DateFormatValidator::class, DateValidator::class],
            'date_end' => [RequiredValidator::class, DateFormatValidator::class, DateValidator::class, DateEndValidator::class],
            'postal' => [RequiredValidator::class, NumericValidator::class, PostalCodeValidator::class],
            'rapport' => [RequiredValidator::class],
            'plateform' => [RequiredValidator::class],
            'message' => [RequiredValidator::class],
        ];
    }

    protected function redirectWithErrors($errors)
    {
        // C'est pas OK, on place les erreurs de validation dans la session
        $_SESSION['feedback_estimation_form'] = [
            'success' => false,
            'data' => $this->data,
            'errors' => $errors,
        ];

        // On redirige l'utilisateur vers le formulaire pour y afficher le feedback d'erreurs.
        return wp_safe_redirect(($this->data['_wp_http_referer'] ?? '') . '#estimation', 302);
    }

    protected function handle()
    {
        $firstname         = $this->data['firstname'];
        $lastname          = $this->data['lastname'];
        $sender            = $this->data['email'];
        $ministationNumber = $this->data['ministation_number'];
        $pollutions        = $this->data['pollution'];
        $dateStart         = $this->data['date_start'];
        $dateEnd           = $this->data['date_end'];
        $rapport           = $this->data['rapport'];
        $plateform         = $this->data['plateform'];
        $postalCode        = $this->data['postal'];
        $message           = $this->data['message'];

        $google = new GoogleApi();
        $coordinate = $google->getCoordinateFromZipCode($postalCode);
        $ownPoint = noair_getLatAndLngIssep();

        $distance = DistanceHelper::calcDistanceInKm($ownPoint, $coordinate);
        $formatDistance = number_format((float)$distance, 2, '.', '');

        $allPrice = noair_calc_all_estimation_price_form(
            $ministationNumber,
            $pollutions,
            $formatDistance,
            ['start' => $dateStart, 'end' => $dateEnd],
            $rapport,
            $plateform,
        );

        $email = "natacha.belboom@hotmail.com";

        /*$content = 'Bonjour, vous avez reçu une nouvelle estimation.';
        $content .= 'de ' . ucfirst( $firstname ) . ' ' . strtoupper( $lastname );
        $content .= 'email : ' . $sender;
        $content .= 'Message : ' . $message;
        $content .= 'Calcul de l\'estimation: ';*/

        $estimationMessage = 'Nombre de ministation: ' . $ministationNumber . '. Coût: ' . $allPrice['ministation_price'] . '€. <br/>';
        $estimationMessage .= 'Les polluants sélectionnés sont: ' . json_encode($pollutions) . '. Coût: ' . $allPrice['pollution_price'] . '€. <br/>';
        $estimationMessage .= 'La période commence le ' . $dateStart . '. Et se termine le ' . $dateEnd . '. <br/>';
        $estimationMessage .= 'Souhaite un rapport?  ' . $rapport . '. Coût: ' . $allPrice['rapport_price'] . '€. <br/>';
        $estimationMessage .= 'Souhaite une plateforme?  ' . $plateform . '. Coût: ' . $allPrice['plateform_price'] . '€. <br/>';
        $estimationMessage .= 'Le code postal est: ' . $postalCode . '. La distance est donc de: ' . $formatDistance . 'km. Coût: ' . $allPrice['distance_price'] . '€. <br/>';
        $estimationMessage .= ucfirst( $firstname ) . ' ' . ucfirst( $lastname ) . ', ' . $sender . '. <br/>' ;
        $estimationMessage .= $message;

        // Traitement
        $id = wp_insert_post([
            'post_title' => 'Estimation de ' . $this->data['firstname'] . ' ' . $this->data['lastname'],
            'post_type' => 'estimation',
            'post_content' => $this->data['message'],
            'post_status' => 'publish',
            'meta_input' => [
                'estimation' => $estimationMessage,
                'ministation_number' => $ministationNumber,
                'pollution' => $pollutions,
                'distance' => $formatDistance,
                'date_date_start' => $dateStart,
                'date_date_end' => $dateEnd,
                'rapport' => $rapport ? 'Oui' : 'Non',
                'plateform' => $plateform ? 'Oui' : 'Non',
                'postal_code' => $postalCode,
                'price_ministation_price' => $allPrice['ministation_price'],
                'price_pollution_price' => $allPrice['pollution_price'],
                'price_distance_price' => $allPrice['distance_price'],
                'price_date_price' => $allPrice['date_price'],
                'price_rapport_price' => $allPrice['rapport_price'],
                'price_plateform_price' => $allPrice['plateform_price'],
                'price_total_price' => $allPrice['total_price'],
            ],
        ]);

        // Envoyer l'email à l'admin
        $mail = wp_mail('natacha.belboom@hotmail.com', 'Nouvelle estimation', $estimationMessage);
    }

    protected function redirectWithSuccess()
    {
        // Ajouter le feedback positif à la session
        $_SESSION['feedback_estimation_form'] = [
            'success' => true,
        ];

        return wp_safe_redirect($this->data['_wp_http_referer'] . '#estimation', 302);
    }
}