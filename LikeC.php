<?PHP
include_once "../config.php";

class LikeC {
    function ajouterLike($like){
        $sql="INSERT INTO likes (id_forum,id_user) VALUES (:id_forum,:id_user)";

        $db = config::getConnexion();

        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id_forum',$like->getIdForum());
            $req->bindValue(':id_user',$like->getIdUser());
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }


    function supprimerLike($id){
        $sql="DELETE FROM likes where id= :id";
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

    function recupererLikesByIdForum($id_forum){
        $sql="SELECT * from likes where id_forum='$id_forum'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste->rowCount();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererLikesByIdForumUser($id_forum,$id_user){
        $sql="SELECT * from likes where id_forum='$id_forum' and id_user='$id_user'";
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


