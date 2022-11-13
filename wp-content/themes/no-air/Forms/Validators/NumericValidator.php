<?php

class NumericValidator extends BaseValidator
{
    protected function handle($value): ?string
    {
        if (!ctype_digit($value)) {
            return __('Ce champ doit contenir uniquement des chiffres', 'noair');
        }

        return null;
    }
}