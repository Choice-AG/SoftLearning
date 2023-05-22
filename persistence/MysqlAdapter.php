<?php

declare(strict_types=1);
/* include '../exceptions/ServiceException.php'; */

class MysqlAdapter {
    protected mysqli $connection;
    protected bool $connected = false;

    //Aprovechamos el constructor para establecer la conexión por defecto en nuestra BD
    public function __construct() {
        try {
            $this->connection = new mysqli("127.0.0.1", "userdaw1", "M3phpdaw@", "softlearning", 3306);
            $this->connected = true;
        } catch (mysqli_sql_exception $ex) {
            throw new ServiceException("DB Connection Failure: " . $ex->getMessage());
        }
    }

    public function __destruct() {
        $this->closeConnection();
    }

    public function isConnected(): bool {
        return $this->connected;
    }

    //siempre podremos reconectarnos a otros BD's aprovechando el mismo objeto
    public function connect(string $host, string $user, string $password, string $db, int $port){
        if ($this->connected == true) {
            $this->closeConnection();
        }
        try {
            $this->connection = new mysqli($host, $user, $password, $db, $port);
            $this->connected = true;
        } catch (mysqli_sql_exception $ex) {
            throw new ServiceException("DB Connection Failure: " . $ex->getMessage());
        }
    }

    public function closeConnection() {
        if ($this->connected == true) {
            $this->connection->close();
            $this->connected = false;
        }
    }

    public function readQuery(string $query): array {
        $dataset = [];
        $result = $this->connection->query($query);
        if ($result != false) {
            while ($row = $result->fetch_assoc()) {
                $dataset[] = $row;
            }
        }
        return $dataset;
    }

    public function writeQuery(string $query): bool {
        $result = $this->connection->query($query);
        return $result;
    }
}
