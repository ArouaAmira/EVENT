<?PHP

	class TypeC {

		function ajouterType($Type){
			$sql="INSERT INTO Type (nom)
			VALUES (:nom)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$query->execute([
					'nom' => $Type->getNom(),

				]);
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

		function afficherType(){

			$sql="SELECT * FROM Type";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function supprimerType($id){
			$sql="DELETE FROM Type WHERE id= :id";
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
		function modifierType($type, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Type SET
						nom = :nom

					WHERE id = :id'
				);
				$query->execute([
					'nom' => $type->getNom(),

					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

function recupererType($id){
			$sql="SELECT * from type where id=$id";
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
	function oldPic($nom)
		{
	 $db = config::getConnexion();
	 $sql = "SELECT 	image_src FROM cours WHERE type=:nom";
	 $liste= $db->prepare($sql);
	 $liste->execute(['nom' => $nom]);
	 $oldimage =  $liste->fetchAll(PDO::FETCH_ASSOC);
	 foreach ($oldimage  as $value):
	 unlink("../views/admin/uploads/" . $value['image_src']);
	 endforeach;
	 }



}
?>
