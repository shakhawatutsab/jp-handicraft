<?php

if (!function_exists('bn')) {
    /**
     * Convert English numbers to Bangla numbers
     */
    function bn($number)
    {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

        return str_replace($en, $bn, (string)$number);
    }
}