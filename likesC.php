<?PHP
include_once "../config.php";

class likesC {
    function ajouterlike($like){
        $sql="INSERT INTO likec (id_commentaire,id_forum,id_user) VALUES (:id_commentaire,:id_forum,:id_user)";

        $db = config::getConnexion();

        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id_commentaire',$like->getIdCommentaire());
            $req->bindValue(':id_forum',$like->getIdForum());
            $req->bindValue(':id_user',$like->getIdUser());
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function supprimerLike($id){
        $sql="DELETE FROM likec where id= :id";
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

    function recupererLikesByIdForum($id_commentaire){
        $sql="SELECT * from likec where id_commentaire='$id_commentaire'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recupererLikesByIdForumUser($id_commentaire,$id_user,$id_forum){
        $sql="SELECT * from likec where id_commentaire='$id_commentaire' and id_user='$id_user' and id_forum='$id_forum'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

   



}

?>


