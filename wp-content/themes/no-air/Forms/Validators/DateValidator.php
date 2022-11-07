<?php

class DateValidator extends BaseValidator
{
    protected function handle($value): ?string
    {
        if ($value < strtotime('today')) {
            return __('Cette date doit être dans le futur', 'noair');
        }

        if($value ){
            return __('Cette date n\'est pas valide', 'noair');
        }

        return null;
    }
}
