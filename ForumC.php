<?PHP
include ("../config.php");

class ForumC {
    function ajouterForum($forum){
       /* $errors = array();
  $file_name = $_FILES['images']["name"];
	$file_size = $_FILES['images']["size"];
	$file_tmp_name = $_FILES['images']["tmp_name"];
	$file_parts = explode('.', $file_name);
	$file_ext = strtolower(end($file_parts));
  $extensions = array("jpeg", "jpg", "png");
	if (in_array($file_ext, $extensions) === false) {
			$errors[] = ["This extension file is not allowed, use png, jpg or jpeg"];
	}
 if (empty($errors) == true) {
move_uploaded_file($file_tmp_name, "../views/photosforum/" . $file_name);
	} else {
			print_r($errors);
			die();
	}*/
        $sql="INSERT INTO forum (sujet,question,image,id_user,date) VALUES (:sujet,:question,:images_src,:id_user,NOW())";

        $db = config::getConnexion();

        try{
            $req=$db->prepare($sql);
            $req->bindValue(':sujet',$forum->getSujet());
            $req->bindValue(':question',$forum->getQuestion());
            $req->bindValue(':images_src',$forum->getImage());
            $req->bindValue(':id_user',$forum->getIdUser());
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherForum(){
        $sql="SELECT forum.*,nom,prenom FROM forum inner join utilisateur on forum.id_user=utilisateur.id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function supprimerForum($id){
        $sql="DELETE FROM forum where id= :id";
        $db = config::getConnexion();

        try{

                $sqldeleteComments="DELETE FROM Commentaire where id_forum=:id_forum";
                $req1=$db->prepare($sqldeleteComments);
                $req1->bindValue(':id_forum',$id);
                $req1->execute();
               
            

            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererForumById($id){
        $sql="SELECT forum.*,nom,prenom FROM forum inner join utilisateur on forum.id_user=utilisateur.id where forum.id='$id'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererForumByUserId($id_user){
        $sql="SELECT forum.*,nom,prenom FROM forum inner join utilisateur on forum.id_user=utilisateur.id where id_user='$id_user'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierForum($forum){
        $sql="UPDATE forum SET sujet=:sujet , question=:question ,image=:image  WHERE id=:id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':sujet',$forum->getSujet());
            $req->bindValue(':question',$forum->getQuestion());
            $req->bindValue(':id',$forum->getId());
            $req->bindValue(':image',$forum->getImage());
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }



}

?>


