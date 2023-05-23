<?php

declare(strict_types=1);

class User {

    protected int $id;
    protected string $name;
    protected int $level;
    protected int $points;
    protected string $password;

    public function __construct(int $id, string $name, string $password,
            int $level = 1, int $points = 0) {
        $message = "";
        if ($this->setName($name) != 0) {
            $message .= "Bad Name;";
        }
        if ($this->setId($id) != 0) {
            $message .= "Bad Ident;";
        }
        if ($this->setPassword($password) != 0) {
            $message .= "Bad password;";
        }
        if ($this->setLevel($level) != 0) {
            $message .= "Bad level;";
        }
        if ($this->setPoints($points) != 0) {
            $message .= "Bad points;";
        }
        if (strlen($message) > 0) {
            throw new BuildException($message);
        }
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getLevel(): int {
        return $this->level;
    }

    public function getPoints(): int {
        return $this->points;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setId(int $id): int {
        $error = Checker::NumberValidator($id);
        if ($error == 0) {
            $this->id = $id;
        }
        return $error;
    }

    public function setName(string $name): int {
        $error = Checker::StringValidator($name, 3);
        if ($error == 0) {
            $this->name = $name;
        }
        return $error;
    }

    public function setLevel(int $level): int {
        $error = Checker::NumberValidator($level);
        if ($error == 0) {
            $this->level = $level;
        }
        return $error;
    }

    public function setPoints(int $points): int {
        $error = Checker::NumberValidator($points);
        if ($error > -2) {
            $this->points = $points;
            return 0;
        }
        return $error;
    }

    public function setPassword(string $password): int {
        $error = Checker::StringValidator($password, 3);
        if ($error == 0) {
            $this->password = $password;
        }
        return $error;
    }

}
