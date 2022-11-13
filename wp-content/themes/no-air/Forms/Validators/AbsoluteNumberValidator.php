<?php

class AbsoluteNumberValidator extends BaseValidator
{
     protected function handle($value): ?string
     {
         if ((int) $value <= 0) {
             return __('Ce champ doit être strictement supérieur à 0', 'noair');
         }

         return null;
     }
}