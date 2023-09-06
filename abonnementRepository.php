<?php

class abonnementRepository
{


    // open mysql data base
    public function open_db()
    {
        $this->condb = config::getConnexion();
    }


    // insert record
    public function addAbon($abon)
    {
        $this->open_db();
        $query = $this->condb->prepare("Insert Into abonnement(nom, type, dateAb) values (:nom,:type,:dateAb)");

        try {
            $query->execute([
                'nom' => $abon->getNom(),
                'type' => $abon->getType(),
                'dateAb' =>date($abon->getDateAb())
            ]);
        } catch (Exception $a) {
            echo 'Error : ' . $a->getMessage();
        }
    }

    //update record
    public function updateAbon($abon)
    {

        $this->open_db();
        $q = $this->condb->prepare("UPDATE abonnement SET  nom=:nom,type=:type,dateAb=:dateAb  where idAb=:idAb");
        $q->bindValue(':idAb', (int) $_SESSION['idAb']);
        $q->bindValue(':nom', $abon['nom']);
        $q->bindValue(':type',(int) $abon['type']);
        $q->bindValue(':dateAb', date($abon['dateAb']));
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
        $query = $this->condb->prepare("DELETE FROM abonnement WHERE idAb=:idAb");
        $query->bindValue(":idAb", $id);
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
                $query = $this->condb->prepare("SELECT * FROM abonnement WHERE nom like'%$search%'");
            } else {
                if ($id > 0) {
                    $query = $this->condb->prepare("SELECT * FROM abonnement WHERE idAb=:id");
                    $query->bindValue(":id", $id);
                } else {
                    $query = $this->condb->prepare("SELECT * FROM abonnement");
                }
            }
            $query->execute();
            $res = $query->fetchAll();
            return $res;
        } catch (Exception $a) {
            echo 'Error : ' . $a->getMessage();
        }

    }

    public function getAbonByday()
    {
        try {
            $this->open_db();

            $query = $this->condb->prepare('SELECT DATE_FORMAT(dateAb, "%d/%m/%Y") as name , count(idAb) as y FROM abonnement group by name ');

            $query->execute();
            return $res = $query->fetchAll();

            return json_encode($res);
        } catch (Exception $a) {
            echo 'Error : ' . $a->getMessage();
        }
    }

}

?>