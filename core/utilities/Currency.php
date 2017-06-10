<?php
/**
* Convert ke rupiah
*/
class Currency
{
    public static function rupiah($number)
    {
        return "Rp ".number_format($number, 2, ",", ".");
    }
}
