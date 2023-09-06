<?PHP
	class CalendrierC {

		function ajouterCalendrier($calendrier){
			$sql="INSERT INTO calen (type,datee,nbseances,chaque,coursid)
			VALUES (:type,:datee,:nbseances,:chaque,:coursid)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$query->execute([
					'type' => $calendrier->getType(),
					'datee' => $calendrier->getDate(),
					'nbseances' => $calendrier->getNbseances(),
					'chaque' => $calendrier->getChaque(),
					'coursid' => $calendrier->getCoursid()

				]);
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

function afficherCalendrier(){

			$sql="SELECT * FROM calen";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


		function modifierCalendrier($calendrier, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE calen SET
						type = :type,
						datee = :datee,
						nbseances = :nbseances,
						chaque = :chaque

					WHERE id = :id'
				);
				$query->execute([
					'type' => $calendrier->getType(),
					'datee' => $calendrier->getDate(),
					'nbseances' => $calendrier->getNbseances(),
					'chaque' => $calendrier->getChaque(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererCalendrier($id){
					$sql="SELECT * from calen where id=$id";
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
				function supprimerCalendrier($id){
					$sql="DELETE FROM calen WHERE id= :id";
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
				function recupererCalendrierparcoursid($id){
							$sql="SELECT * from calen where coursid=$id";
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


}
?>
