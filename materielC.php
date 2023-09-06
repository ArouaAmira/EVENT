<?PHP
include "../config.php";
require_once '../model/materiel.php';

class MaterielC {

	
	
	function ajoutermateriel($materiel){
		$sql="INSERT INTO materiaux (identifiant,nom,type,marque,prix,quantite) 
			VALUES (:identifiant,:nom,:type,:marque,:prix,:quantite)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'identifiant' => $materiel->getidentifiant(),
					'nom' => $materiel->getNom(),
					'type' => $materiel->getTypee(),
					'marque' => $materiel->getMarque(),
					'prix' => $materiel->getPrix(),
					'quantite' => $materiel->getQuantite()
					
				]);		
          				
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		
	}
	
	function affichermateriels(){
		
		$sql="SElECT * From materiaux ORDER BY identifiant";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function affichermater(){
		
		$sql="SElECT * From materiaux ORDER BY quantite ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function affichermaterr(){
		
		$sql="SElECT * From materiaux ORDER BY quantite DESC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimermateriel($identifiant){
		$sql="DELETE FROM materiaux where identifiant= :identifiant";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':identifiant',$identifiant);
		try{
            $req->execute();
           
        }
	
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiermateriel($materiel,$identifiant){
		try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE materiaux SET 
						identifiant=:identifiant,
						nom = :nom,
						type = :type,
						marque=:marque,
						prix=:prix,
						quantite=:quantite
						
					WHERE identifiant = :identifiant'
				);
				$query->execute([
					'identifiant' => $identifiant,
					'nom' => $materiel->getNom(),
					'type' => $materiel->getTypee(),
					'marque'=>$materiel->getMarque(),
					'prix'=>$materiel->getPrix(),
					'quantite'=>$materiel->getQuantite()
					
					
					
				]);
				
			} catch (PDOException $e) {
				$e->getMessage();
		
	}
	function recuperermateriel($identifiant){
			$sql="SELECT * from materiaux where identifiant=$identifiant";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$materiel=$query->fetch();
				return $materiel;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	

    }
}
?>