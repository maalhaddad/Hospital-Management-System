<?php


if (!function_exists('convertNumberToArabicWordsWithCurrency')) {
    function convertNumberToArabicWordsWithCurrency($amount, $currency = 'ريال') {
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
