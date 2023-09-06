<?php
require 'model/promotionRepository.php';
require 'model/Promotion.php';
require_once 'config.php';

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

class promotionController
{

    function __construct()
    {
        $this->db = new config();
        $this->promObj = new promotionRepository($this->db);
    }

    // mvc handler request
    public function mvcHandler()
    {
        $act = isset($_GET['act']) ? $_GET['act'] : NULL;
        switch ($act) {

            case 'add' :
                $this->insert();
                break;
            case 'update':
                $this->update();
                break;
            case 'search':
                $this->displayProm();
                break;
            case 'delete' :
                $this->delete();
                break;
            default:
                $this->displayProm();
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
            $prom = new Promotion();
            if (isset($_POST['addbtn'])) {
                // read form value
                $prom->setNom(trim($_POST['nom']));
                $prom->setPourcentage(trim($_POST['pourcentage']));
                $prom->setDateProm(trim($_POST['dateProm']));
                //call insert record
                $pid = $this->promObj->addProm($prom);
                $this->displayProm();

            }
            header('location:'.'view/ajouterPromotion.php');
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
                $update['pourcentage'] = trim($_POST['pourcentage']);
                $update['dateProm'] = trim($_POST['dateProm']);

                $res = $this->promObj->updateProm($update);
                $this->displayProm();


            } elseif (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

                $id = $_GET['id'];
                $result = $this->promObj->selectRecord($id)[0];

                $promObj = new promotion(
                    $result["idProm"],
                    $result["nom"],
                    $result["pourcentage"],
                    $result["dateProm"]
                );

                $_SESSION['idProm'] = $result["idProm"];

                $_SESSION['Promotion'] = serialize($promObj);
                $this->pageRedirect('view/modifierPromotion.php');

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
                $this->promObj->deleteProm($id);
                $this->pageRedirect('indexPromotion.php');

            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $a) {
            $this->close_db();
            throw $a;
        }
    }

    public function displayProm()
    {
        $result = $this->promObj->selectRecord(0);
        include "view/afficherPromotion.php";
    }
}


?>