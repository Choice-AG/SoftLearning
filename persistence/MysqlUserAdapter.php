<?php

declare(strict_types=1);

include '../model/users/User.php';
include 'MySQLAdapter.php';

class MysqlUserAdapter extends MysqlAdapter {

    public function getUser(int $id): User {
        $data = $this->readQuery("SELECT id,name,password,level,points FROM users WHERE id =" . $id . ";");
        if (count($data) > 0) {
            return new User((int) $data[0]["id"], $data[0]["name"], $data[0]["password"],
                    (int) $data[0]["level"], (int) $data[0]["points"]
            );
        } else {
            throw new ServiceException("Not User found with id = " . $id);
        }
    }

    public function deleteUser(int $id): bool {
        try {
            return $this->writeQuery("DELETE FROM users WHERE id = " . $id . ";");
        } catch (mysqli_sql_exception $ex) {
            throw new ServiceException("Error al esborrar al usuari " . $id . "-->" .
                            $ex->getMessage());
        }
    }

    public function addUser(User $u): bool {
        try {
            return $this->writeQuery("INSERT INTO users (id,name,password,level,points)" .
                            " VALUES (" . $u->getId() . ",\"" . $u->getName() . "\",\"" .
                            $u->getPassword() . "\"," . $u->getLevel() . "," . $u->getPoints() . ");");
        } catch (mysqli_sql_exception $ex) {
            throw new ServiceException("Error al insertar usuari -->" . $ex->getMessage());
        }
    }

    public function updateUser(User $u): bool {
        try {
            return $this->writeQuery("UPDATE users SET name = \"" . $u->getName() . "\"," .
                            "password = \"" . $u->getPassword() . "\"," .
                            "level = " . $u->getLevel() . "," .
                            "points = " . $u->getPoints() .
                            " WHERE id = " . $u->getId() . ";");
        } catch (mysqli_sql_exception $ex) {
            throw new ServiceException("Error al actualitzar usuari -->" . $ex->getMessage());
        }
    }

    public function authentication(string $usuari, string $passwd): User {
        try {
            $id = $this->readQuery("SELECT id FROM users WHERE name='" . $usuari . "' and password='" . $passwd . "';");
            if (count($id) > 0) {
                return $this->getUser((int) $id[0]["id"]);
            } else {
                throw new ServiceException("Usuari o password incorrecte--> " . $id);
            }
        } catch (mysqli_sql_exception $ex) {
            throw new ServiceException("Error al llegir users -->" . $ex->getMessage());
        }
    }
    
    public function exists (string $usuari): bool {
        try {
            $id = $this->readQuery("SELECT id FROM users WHERE name='" . $usuari. "';");
            if (count($id) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $ex) {
            throw new ServiceException("Error al llegir users -->" . $ex->getMessage());
        }
    }

    public function maxUserid(): int {
        try {
            $id = $this->readQuery("SELECT max(id) as last FROM users;");
            return (int) $id[0]["last"];
        } catch (mysqli_sql_exception $ex) {
            throw new ServiceException("Error al llegir users -->" . $ex->getMessage());
        }
    }

}
