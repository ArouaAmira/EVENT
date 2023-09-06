<?PHP
include_once "../config.php";

class CommentaireC {
    function ajouterCommentaire($commentaire){
        $sql="INSERT INTO Commentaire (commentaire,id_forum,id_user,date) VALUES (:commentaire,:id_forum,:id_user,NOW())";

        $db = config::getConnexion();

        try{
            $req=$db->prepare($sql);
            $req->bindValue(':commentaire',$commentaire->getCommentaire());
            $req->bindValue(':id_forum',$commentaire->getIdForum());
            $req->bindValue(':id_user',$commentaire->getIdUser());
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherCommentaire(){
        $sql="SELECT * FROM Commentaire";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function supprimerCommentaire($id){
        $sql="DELETE FROM Commentaire where id= :id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererCommentaireByIdForum($id_forum){
        $sql="SELECT Commentaire.*,nom,prenom  FROM Commentaire inner join utilisateur on utilisateur.id=Commentaire.id_user where id_forum='$id_forum' order by date";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierCommentaire($commentaire){
        $sql="UPDATE Commentaire SET commentaire=:commentaire  WHERE id=:id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':sujet',$commentaire->getCommentaire());
            $req->bindValue(':id',$commentaire->getId());
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }



}

?>


