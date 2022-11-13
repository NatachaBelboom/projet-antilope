<?php

use Carbon\Carbon;

class DateFormatValidator extends BaseValidator
{
    protected function handle($value): ?string
    {
        if (!Carbon::hasFormat($value, 'Y-m-d')) {
            return __('Le format de la date n\'est pas valide', 'noair');
        }

        return null;
    }
}