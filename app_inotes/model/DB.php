<?php


class DB
{
    private const DSN_DB = 'mysql:host=localhost;dbname=app_inotes';
    private const USER_DB = 'root';
    private const PASS_DB = '@Haitran123';

    private function __construct()
    {
    }

    public static function connection()
    {
        return new PDO(self::DSN_DB, self::USER_DB, self::PASS_DB);
    }
}