<?php

class CoursC{

  function ajouterCours($cours){
  $errors = array();
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
move_uploaded_file($file_tmp_name,"../../views/admin/uploads/". $file_name);
	} else {
			print_r($errors);
			die();
	}
 $sql = "INSERT INTO cours(type,image_src,difficulte,description,nbeleve,prix) VALUES (:type,:image,:difficulte,:description,:nbeleve,:prix)";

 $db = config::getConnexion();
 try{
	 $query = $db->prepare($sql);
 	 $query->execute([
		 'type' => $cours->getType(),
		 'difficulte' => $cours->getDifficulte(),
		 'description' => $cours->getDescription(),
		 'nbeleve' => $cours->getNbeleve(),
		 'prix' => $cours->getPrix(),
		 'image' => $file_name
  ]);
 }
 catch (Exception $e){
	 echo 'Erreur: '.$e->getMessage();
 }
}

function afficherCours(){

$sql="SELECT * FROM cours";
$db = config::getConnexion();
try{
$liste = $db->query($sql);
return $liste;
		}
catch (Exception $e){
die('Erreur: '.$e->getMessage());
			}
	}

	function supprimerCours($id){
		$sql="DELETE FROM cours WHERE id= :id";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
			$req->execute();
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}

	function recupererCours($id){
		$sql="SELECT * from cours where id=$id";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
			$query->execute();

			$type = $query->fetch(PDO::FETCH_OBJ);
			return $type;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}

	function oldPic($id)
	{
    $db = config::getConnexion();
   	$sql = "SELECT 	image_src FROM cours WHERE id=:id";
   	$liste= $db->prepare($sql);
   	$liste->execute(['id' => $id]);
    $result =  $liste->fetch(PDO::FETCH_ASSOC);
    $oldimage = $result['image_src'];
    return $oldimage;
	}
	function modifierCours($cours, $id){
		$coursC=new CoursC();
$oldimage =$coursC->oldPic($id);
$db = config::getConnexion();
$errors = array();
$image7=$_POST['images'];
$g=false;
$file_name = $_FILES['images']["name"];
$file_size = $_FILES['images']["size"];
$file_tmp_name = $_FILES['images']["tmp_name"];
$file_parts = explode('.', $file_name);
$file_ext = strtolower(end($file_parts));
/*$extensions = array("jpeg", "jpg", "png");
if (in_array($file_ext, $extensions) === false) {
		$errors[] = ["This extension file is not allowed, use png, jpg or jpeg"];
}*/
if ($image7==$oldimage) {
$file_name=$oldimage;
$g=1;
}
		try {

			$query = $db->prepare(
				'UPDATE cours SET type=:type , image_src=:image , difficulte=:difficulte
				, description=:description , nbeleve=:nbeleve , prix=:prix WHERE id=:id'
			);

			if ($query->execute([':type' => $cours->getType(), ':id' => $id ,':image' => $file_name,':difficulte' => $cours->getDifficulte(),
      ':description' => $cours->getDescription(),':nbeleve' => $cours->getNbeleve(),':prix' => $cours->getPrix()])) {
if ($g!=1) {
  unlink("../../views/admin/uploads/" . $oldimage);
}



      if (empty($errors) == true) {

    move_uploaded_file($file_tmp_name, "../../views/admin/uploads/" . $file_name);
      } else {
          print_r($errors);
          die();
      }

     }


			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

  function searshCours($word)
		{
   $db = config::getConnexion();
	 $sql = "SELECT * FROM cours WHERE type LIKE  '$word%' or difficulte LIKE  '$word%' ";
	 $liste= $db->prepare($sql);
	 $liste->execute();
	 $lista =  $liste->fetchAll(PDO::FETCH_ASSOC);
   return $lista;
  }

  function triCours($word,$w)
    {
   $db = config::getConnexion();
   $sql = "SELECT * FROM cours order by $word $w  ";
   $liste= $db->prepare($sql);
   $liste->execute();
   $lista =  $liste->fetchAll(PDO::FETCH_ASSOC);
   return $lista;
  }

  function prix($word,$w)
    {
   $db = config::getConnexion();
   $sql = "SELECT * FROM cours where prix BETWEEN $word AND $w;";
   $liste= $db->prepare($sql);
   $liste->execute();
   $lista =  $liste->fetchAll(PDO::FETCH_ASSOC);
   return $lista;
  }





































}

 ?>
