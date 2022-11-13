<?php

use Carbon\Carbon;

class DateEndValidator extends BaseValidator
{
    protected function handle($value): ?string
    {
        $dateStartPost = $_POST['date_start'];
        $dateStart = Carbon::parse($dateStartPost);
        $dateEnd = Carbon::parse($value);

        if (empty($dateStartPost)) {
            return __('Vous devez d\'abord entrer une date de début', 'noair');
        }

        if ($dateStart->diffInSeconds($dateEnd, true) <= 0) {
            return __('La date doit être supérieure à celle de début', 'noair');
        }

        return null;
    }
}