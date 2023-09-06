<?PHP
include "../config.php";
require_once '../model/categorie.php';

class CategorieC {

	
	
	function ajoutercategorie($categorie){
		$sql="INSERT INTO categories (id, famille, type,def) 
			VALUES (:id,:famille,:type,:def)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'id' => $categorie->getid(),
					'famille' => $categorie->getFamille(),
					'type' => $categorie->getNom(),
					'def' => $categorie->getDef()
					
				]);		
          				
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		
	}
	
	function affichercategories(){
		
		$sql="SElECT * From categories ORDER BY id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercategorie($id){
		$sql="DELETE FROM categories where id= :id";
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
	function modifiercategorie($categorie,$id){
		try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categories SET 
						id=:id,
						famille=:famille,
						type = :type,
						def = :def
						
					WHERE id = :id'
				);
				$query->execute([
					'id' => $id,
					'famille'=>$categorie->getFamille(),
					'type' => $categorie->getNom(),
					'def' => $categorie->getDef()
					
					
					
				]);
				
			} catch (PDOException $e) {
				$e->getMessage();
		
	}
	function recuperercategorie($ide){
			$sql="SELECT * from categories where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$categorie=$query->fetch();
				return $categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	

    }
}
?>