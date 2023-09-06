<?php

class adminC{

    public function ajouterAdmin($admin){
        try{

            $nom=$admin->getNom();
            $prenom=$admin->getPrenom();
            $mail=$admin->getMail();
            $password=$admin->getPassword();

            $db=config::getConnexion();

            $query2=$db->prepare('INSERT INTO PERSONNE (mail,password) values (:mail, :password)');
            $query2->bindValue(':mail',$mail);
            $query2->bindValue(':password',$password);
            $query2->execute();

            $query3=$db->prepare('SELECT MAX(idp) FROM PERSONNE');//reqt
            $query3->execute();
            $p=$query3->fetch();

            $query=$db->prepare('INSERT INTO admin (idp ,nom, prenom,role) values (:idp,:nom, :prenom,:role)');
            $query->bindValue(':idp',$p['MAX(idp)']);
            $query->bindValue(':nom',$nom);
            $query->bindValue(':prenom',$prenom);
            $query->bindValue(':role',"simple_admin");

            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function afficheradmins(){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM personne, admin  where personne.idp = admin.idp');//reqt
            $query->execute();
            return $query->fetchAll();//return ligne dan requette de bd
        }catch(PDOException $e){
            $e->getMessage();
        }
    }



    public function findadmin($id){
        try{
            $db=config::getConnexion();

            $query=$db->prepare('SELECT * FROM personne,admin where personne.idp= :id');//reqt
            $query->bindValue(':id',$id);
            $query->execute();
            return $query->fetchAll();//return ligne dan requette de bd

        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    public function modifieradmin($id,$admin){
        try{
            $nom=$admin->getNom();
            $prenom=$admin->getPrenom();
            $mail=$admin->getMail();
            $password=$admin->getPassword();

            $db=config::getConnexion();
            $query2=$db->prepare('UPDATE PERSONNE SET mail= :mail,password= :password where idp= :idp');

            $query2->bindValue(':mail',$mail);
            $query2->bindValue(':password',$password);
            $query2->bindValue(':idp',$id);

            $query2->execute();



            $query=$db->prepare('UPDATE admin SET nom= :nom, prenom= :prenom WHERE idp= :idp');//reqt

            $query->bindValue(':idp',$id);
            $query->bindValue(':nom',$nom);
            $query->bindValue(':prenom',$prenom);
            $query->execute();


        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    public function deleteadmin($idp){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('DELETE FROM PERSONNE WHERE idp= :idp');//reqt
            $query->bindValue(':idp',$idp);
            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

}

?>
