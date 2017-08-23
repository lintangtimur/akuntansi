<?php
/**
* Convert ke rupiah
*/
class Currency
{
    /**
   * pemformatan number rupiah
   * @param  string $number angka berapa yang akan diformat
   * @return mixed        return in string concat
   */
    public static function rupiah($number)
    {
        return "Rp ".number_format($number, 2, ",", ".");
    }
}
