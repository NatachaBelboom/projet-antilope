<?php

class AlphaValidator extends BaseValidator
{
    protected function handle($value): ?string
    {
        $value = str_replace(' ', '', $value);
        $value = str_replace('-', '', $value);
        if (!ctype_alpha($value)) {
            return __('Ce champ doit contenir uniquement des lettres', 'noair');
        }

        return null;
    }
}