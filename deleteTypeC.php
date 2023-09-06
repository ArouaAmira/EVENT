<?PHP
	include "TypeC.php";
require('../config.php');
	$typeC=new TypeC();

	if (isset($_GET["id"])&&isset($_GET["nom"])){
		$typeC->oldPic($_GET["nom"]);
		$typeC->supprimerType($_GET["id"]);
		header('Location:../views/admin/table.php');
	}

	/*function oldPic($nom)
	{
 $db = config::getConnexion();
 $sql = "SELECT 	image_src FROM cours WHERE type=:nom";
 $liste= $db->prepare($sql);
 $liste->execute(['nom' => $nom]);
 $oldimage =  $liste->fetchAll(PDO::FETCH_ASSOC);
 foreach ($oldimage  as $value):
 unlink('../views/uploads/' . $value['image_src']);
 endforeach;
}*/

?>
