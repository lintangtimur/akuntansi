<?php
/**
* Database class
*
* Database access using mysqli
*/
class Database
{
    /**
    * @var string host yang dituju, Ex:localhost or IP Addr
    */
    private static $host = "localhost";

    /**
    * @var string user untuk login database
    */
    private static $user = "root";

    /**
    * @var string password masuk ke dalam database
    */
    private static $pass = "";

    /**
    * @var string nama database yang digunakan
    * untuk login
    */
    private static $dbname = "jurnallatihan";

    /**
    * Fungsi menghubungkan ke database, berupa static method
    */
    public static function Connect()
    {
        try {
            $connect = new mysqli(self::$host, self::$user, self::$pass, self::$dbname);
            if ($connect->connect_errno) {
                die("FAILED TO CONNECT");
            } else {
                return $connect;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
