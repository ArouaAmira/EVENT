<?php

class Promotion
{
    private $idProm = null;
    private $Nom = null;
    private $DateProm = null;
    private $Pourcentage = null;

    function __construct($idProm = null, $Nom = null, $Pourcentage = null, $DateProm = null)
    {
        $this->idProm = $idProm;
        $this->Nom = $Nom;
        $this->Pourcentage = $Pourcentage;
        $this->DateProm = $DateProm;

    }

    function setidProm(int $id): void
    {    //setter
        $this->idProm = $id;
    }

    function setNom(string $Nom): void
    {
        $this->Nom = $Nom;
    }

    function setDateProm(string $DateProm): void
    {
        $this->DateProm = $DateProm;
    }

    function setPourcentage(string $Pourcentage): void
    {
        $this->Pourcentage = $Pourcentage;
    }


    function getidProm(): int
    {     //getter
        return $this->idProm;
    }

    function getNom(): string
    {
        return $this->Nom;
    }

    function getDateProm()
    {
        return $this->DateProm;
    }

    function getPourcentage(): string
    {
        return $this->Pourcentage;
    }
}
