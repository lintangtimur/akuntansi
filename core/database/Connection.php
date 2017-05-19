<?php

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
