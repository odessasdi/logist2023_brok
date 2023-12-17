<?php

namespace App\Helpers;

class ContainerHelper
{
    public static function isValidContainerNumber($containerNumber)
    {
        // Проверка формата номера (по желанию) 
        if (!preg_match('/^[A-Z]{4}\d{6}[0-9]$/', $containerNumber)) {
            return false;
        }

        // Вызов функции для расчета контрольной цифры ISO 6346:2022
        return self::checkDigitMatches($containerNumber);

    }

    protected static function checkDigitMatches($number)
    {
        if (!preg_match('/^[A-Z]{4}\d{6}\d$/', $number)) {
            return false;
        }
    
        $replacements = array_combine(range('A', 'Z'), range(10, 35));
        $checkDigit = substr($number, -1);
        $number = substr($number, 0, -1);
    
        $sum = 0;
        foreach (str_split($number) as $i => $char) {
            $value = is_numeric($char) ? $char : $replacements[$char];
            $sum += $value * pow(2, $i);
        }
    
        return $sum % 11 % 10 == $checkDigit;
    }
    
}
