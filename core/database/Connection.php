<?php

/**
 * Membuat Koneksi ke database
 */
class Connection
{
    /**
   * Fungsi untuk menyambungkan ke database
   */
    public static function Connect()
    {
        try {
            return new mysqli("localhost", "root", "", "jurnallatihan");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
