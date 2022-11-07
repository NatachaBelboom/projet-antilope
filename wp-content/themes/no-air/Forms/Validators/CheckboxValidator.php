<?php

class CheckboxValidator extends BaseValidator
{
    protected function handle($value) : ?string
    {
        if(empty($value))
        {
            return __('Veuillez cocher au moins une valeur', 'noair');
        }

        return null;
    }
}