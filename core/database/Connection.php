<?php

/**
* Membuat koneksi ke database
*/
class Connection
{
    public static function Connect()
    {
        try {
            return new mysqli("localhost", "root", "", "jurnallatihan");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
