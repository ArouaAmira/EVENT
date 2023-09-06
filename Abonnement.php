<?php

class Abonnement
{
    private $idAb = null;
    private $Nom = null;
    private $DateAb = null;
    private $Type = null;

    function __construct($idAb = null, $Nom = null, $Type = null, $DateAb = null)
    {
        $this->idAb = $idAb;
        $this->Nom = $Nom;
        $this->Type = $Type;
        $this->DateAb = $DateAb;

    }

    function setidAb(int $id): void
    {    //setter
        $this->idAb = $id;
    }

    function setNom(string $Nom): void
    {
        $this->Nom = $Nom;
    }

    function setDateAb(string $DateAb): void
    {
        $this->DateAb = $DateAb;
    }

    function setType(string $Type): void
    {
        $this->Type = $Type;
    }


    function getidAb(): int
    {     //getter
        return $this->idAb;
    }

    function getNom(): string
    {
        return $this->Nom;
    }

    function getDateAb()
    {
        return $this->DateAb;
    }

    function getType(): int
    {
        return $this->Type;
    }
}
