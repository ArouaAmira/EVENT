<?php

class promotionRepository
{


    // open mysql data base
    public function open_db()
    {
        $this->condb = config::getConnexion();
    }


    // insert record
    public function addProm($Prom)
    {
        $this->open_db();
        $query = $this->condb->prepare("Insert Into promotion(nom, pourcentage, dateProm) values (:nom,:pourcentage,:dateProm)");

        try {
            $query->execute([
                'nom' => $Prom->getNom(),
                'pourcentage' => $Prom->getPourcentage(),
                'dateProm' =>date($Prom->getDateProm())
            ]);
        } catch (Exception $a) {
            echo 'Error : ' . $a->getMessage();
        }
    }

    //update record
    public function updateProm($Prom)
    {

        $this->open_db();
        $q = $this->condb->prepare("UPDATE promotion SET  nom=:nom,pourcentage=:pourcentage,dateProm=:dateProm  where idProm=:idProm");
        $q->bindValue(':idProm', (int) $_SESSION['idProm']);
        $q->bindValue(':nom', $abon['nom']);
        $q->bindValue(':pourcentage', $abon['pourcentage']);
        $q->bindValue(':dateProm', date($abon['dateProm']));
        try {
            $q->execute();
        } catch (Exception $a) {
            echo 'Error : ' . $a->getMessage();
        }


    }

    // delete record
    public function deleteAbon($id)
    {
        $this->open_db();
        $query = $this->condb->prepare("DELETE FROM promotion WHERE idProm=:idProm");
        $query->bindValue(":idProm", $id);
        try {
            $query->execute();
        } catch (Exception $a) {
            die('Error : ' . $a->getMessage());
        }
    }

    // select record
    public function selectRecord($id)
    {

        try {
            $this->open_db();
            if (isset($_POST['search']) && $_POST['search']) {
                $search = $_POST['search'];
                $query = $this->condb->prepare("SELECT * FROM promotion WHERE nom like'%$search%'");
            } else {
                if ($id > 0) {
                    $query = $this->condb->prepare("SELECT * FROM promotion WHERE idProm=:id");
                    $query->bindValue(":id", $id);
                } else {
                    $query = $this->condb->prepare("SELECT * FROM promotion");
                }
            }
            $query->execute();
            $res = $query->fetchAll();
            return $res;
        } catch (Exception $a) {
            echo 'Error : ' . $a->getMessage();
        }

    }
}

?>