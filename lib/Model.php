<?php


namespace Minicli;

class Model
{
    protected $db;

    public function __construct()
    {
        try {
            self::openConnection();
        } catch (\PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    private function openConnection()
    {
        $options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING
        ];

        $enconding = sprintf("; charset=%s", DB_CHARSET);
        if (DB_TYPE == "pgsql") $enconding = sprintf(" options='--client_encoding=%s'", DB_CHARSET);

        $this->db = new \PDO(
            DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . $enconding,
            DB_USER,
            DB_PASS,
            $options
        );
    }
}
