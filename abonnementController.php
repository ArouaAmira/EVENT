<?php
require 'model/abonnementRepository.php';
require 'model/Abonnement.php';
require_once 'config.php';

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

class abonnementController
{

    function __construct()
    {
        $this->db = new config();
        $this->abonObj = new abonnementRepository($this->db);
    }

    // mvc handler request
    public function mvcHandler()
    {
        $act = isset($_GET['act']) ? $_GET['act'] : NULL;
        switch ($act) {

            case 'add' :
                $this->insert();
                break;
            case 'stat' :
                $this->statAbon();
                break;
            case 'update':
                $this->update();
                break;
            case 'search':
                $this->displayAbon();
                break;
            case 'delete' :
                $this->delete();
                break;
            default:
                $this->displayAbon();
        }
    }

    // page redirection
    public function pageRedirect($url)
    {
        header('Location:' . $url,true);
    }

    // add new album
    public function insert()
    {
        try {
            $abon = new Abonnement();
            if (isset($_POST['addbtn'])) {
                // read form value
                $abon->setNom(trim($_POST['nom']));
                $abon->setType(trim($_POST['type']));
                $abon->setDateAb(trim($_POST['dateAb']));
                //call insert record
                $pid = $this->abonObj->addAbon($abon);
                $this->displayAbon();

            }
            header('location:'.'view/ajouterAbonnement.php');
        } catch (Exception $a) {
            $this->close_db();
            throw $a;
        }
    }

    // update record
    public function update()
    {

        try {

            if (isset($_POST['updatebtn'])) {
                $update = [];

                $update['id'] = trim($_POST['idAb']);
                $update['nom'] = trim($_POST['nom']);
                $update['type'] = trim($_POST['type']);
                $update['dateAb'] = trim($_POST['dateAb']);

                $res = $this->abonObj->updateAbon($update);
                $this->displayAbon();


            } elseif (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

                $id = $_GET['id'];
                $result = $this->abonObj->selectRecord($id)[0];

                $eventObj = new abonnement(
                    $result["idAb"],
                    $result["nom"],
                    $result["type"],
                    $result["dateAb"]
                );

                $_SESSION['idAb'] = $result["idAb"];

                $_SESSION['Abonnement'] = serialize($abonObj);
                $this->pageRedirect('view/modifierAbonnement.php');

            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $a) {
            $this->close_db();
            throw $a;
        }
    }

    // delete record
    public function delete()
    {
        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->abonObj->deleteAbon($id);
                $this->pageRedirect('index.php');

            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $a) {
            $this->close_db();
            throw $a;
        }
    }

    public function displayAbon()
    {
        $result = $this->abonObj->selectRecord(0);
        include "view/afficherAbonnement.php";
    }

    public function statAbon()
    {
        $result = $this->abonObj->getAbonByday();
        include "view/statAbonnement.php";
    }
}


?>