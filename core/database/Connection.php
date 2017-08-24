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
            return new PDO('pgsql:dbname=jurnallatihan;host=localhost', 'postgres', 'root');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
