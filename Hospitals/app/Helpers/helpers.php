<?php


if (!function_exists('convertNumberToArabicWordsWithCurrency')) {
    function convertNumberToArabicWordsWithCurrency($amount, $currency = 'ريال')
    {
        $formatter = new NumberFormatter("ar", NumberFormatter::SPELLOUT);

        $integer = floor($amount);
        $fraction = round(($amount - $integer) * 100);

        $result = $formatter->format($integer) . " $currency";

        if ($fraction > 0) {
            $result .= " و" . $formatter->format($fraction) . " هللة";
        }

        return $result;
    }
}

if (!function_exists('getGuardName')) {
    function getGuardName()
    {
        return
            collect([
        'admin',
        'doctor',
        'patient',
        'ray_employee',
        'laboratorie_employee',
    ])->first(fn($guard) => auth($guard)->check());
    }
}

if (!function_exists('getModelGuardName')) {
    function getModelGuardName()
    {
        $text = getGuardName();
        $text = str_replace('_',' ',$text);
        return str_replace(' ','',ucwords($text));
    }
}
