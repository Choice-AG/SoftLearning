<?php

class Vehicle implements JsonSerializable{
    protected string $matricula;
    protected string $marca;
    protected string $model;
    protected DateTime $fechaMatricula;
    protected int $potencia;
    protected string $color;
    
    public function __construct(string $matricula, string $marca, string $model, string $fechaMatricula, int $potencia, string $color) {
        $message = "";
        $error = $this->setMatricula($matricula);
        if ($error != 0) {
            $message .= "Bad Matricula;";
        }
        $error = $this->setMarca($marca);
        if ($error != 0) {
            $message .= "Bad Marca;";
        }
        $error = $this->setModel($model);
        if ($error != 0) {
            $message .= "Bad Model;";
        }
        try {
            $this->setFechaMatricula($fechaMatricula);
        } catch (DateException $ex) {
            $message .= $ex->getMessage();
        }
        $error = $this->setPotencia($potencia);
        if ($error != 0) {
            $message .= "Bad Potencia;";
        }
        $error = $this->setColor($color);
        if ($error != 0) {
            $message .= "Bad Color;";
        }
        if (strlen($message) > 0) {
            throw new BuildException($message);
        }
    }

    public function getJsonFechaMatricula(): String {
        return $this->fechaMatricula->format("d-m-Y");
    }
    public function getMatricula(): string {
        return $this->matricula;
    }

    public function getMarca(): string {
        return $this->marca;
    }

    public function getModel(): string {
        return $this->model;
    }


    public function getFechaMatricula(): string {
        return $this->fechaMatricula->format("d-m-Y (l)");
    }


    public function getPotencia(): int {
        return $this->potencia;
    }

    public function getColor(): string {
        return $this->color;
    }



    public function setMatricula(string $matricula): int {
        $error = Checker::StringValidator($matricula, 6);
        if ($error == 0) {
            $this->matricula = $matricula;
        }
        return $error;
    }

    public function setMarca(string $marca): int {
        $error = Checker::StringValidator($marca, 4);
        if ($error == 0) {
            $this->marca = $marca;
        }
        return $error;
    }

    public function setModel(string $model): int {
        $error = Checker::StringValidator($model, 2);
        if ($error == 0) {
            $this->model = $model;
        }
        return $error;
    }


    public function setFechaMatricula(string $fechaMatricula) {
        $this->fechaMatricula = Checker::checkDate($fechaMatricula);
    }

    public function setPotencia(int $potencia): int {
        $error = Checker::NumberValidator($potencia);
        if ($error == 0) {
            $this->potencia = $potencia;
        }
        return $error;
    }

    public function setColor(string $color): int {
        $error = Checker::StringValidator($color, 4);
        if ($error == 0) {
            $this->color = $color;
        }
        return $error;
    }

    public function getAntiguedad(): int {
        $fechaAhora = new DateTime();
        $fechaMatricula = $this->fechaMatricula;
        $datesDiff = $fechaMatricula->diff($fechaAhora);
        return $datesDiff->y;
    }

    public function getRevision(): array {
        $interval = new DateInterval('P333D');
        $inicio = $this->fechaMatricula;
        $fecha = new DateTime();
        $dateRange = new DatePeriod($inicio, $interval, $fecha);

        $arrayDates = [];
        foreach($dateRange as $date) {
            $arrayDates[] = $date->format('d-m-Y');
        }
        return $arrayDates;
    }

    public function jsonSerialize() {
        return [
            'matricula' => $this->getMatricula(),
            'marca' => $this->getMarca(),
            'model' => $this->getModel(),
            'fechaMatricula' => $this->getJsonFechaMatricula(),
            'potencia' => $this->getPotencia(),
            'color' => $this->getColor()
        ];
    }
}