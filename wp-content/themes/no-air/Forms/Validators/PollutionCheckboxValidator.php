<?php

class PollutionCheckboxValidator extends BaseValidator
{
    protected function handle($value): ?string
    {
        foreach ($value as $id) {
            $query = new WP_Query([
                    'post_type' => 'pollution',
                    'p' => (int) $id
                ]);

            if (empty($query->get_posts())) {
                return __('Une erreur s\'est produite lors de la séléction, veuillez rafraichir la page', 'noair');
            }
        }

        return null;
    }
}