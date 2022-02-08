<?php


class DB {

    private static ?PDO $base = null;
    private static string $dns = "mysql:host=%s;dbname=%s;charset=%s";

    /**
     * Database function Static constructor.
     */
    public function __construct() {
        if (null === self::$base) {
        try {
            $dns = sprintf(self::$dns, config::SERVER, config::DB, config::CHARSET);
            self::$base = new PDO($dns,config::USER, config::PASSWORD);
            self::$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'ok';
        }

        catch (PDOException $exception) {
            echo 'erreur -> ' . $exception->getMessage();

        }
        }
        return self::$base;
    }


}