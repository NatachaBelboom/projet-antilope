<?php

class PostalCodeValidator extends BaseValidator
{
    protected function handle($value): ?string
    {
        if (!preg_match('/^[1-9]{1}[0-9]{3}$/', $value)) {
            return __('Ce code postal ne correspond pas au code postal belge', 'noair');
        }

        return null;
    }
}