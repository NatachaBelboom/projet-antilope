<?php

class CheckboxValidator
{
    protected function handle($value) : ?string
    {
        if($value !== '1')
        {
            return __('Veuillez cocher au moins une valeur', 'noair');
        }

        return null;
    }
}