<?php

use Carbon\Carbon;

class DateValidator extends BaseValidator
{
    protected function handle($value): ?string
    {
        $date = Carbon::parse($value);

        if (Carbon::now()->diffInSeconds($date, false) < 0) {
            return __('Cette date doit être dans le futur', 'noair');
        }

        return null;
    }
}
