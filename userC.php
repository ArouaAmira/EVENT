<?php

class UserC{

    public function inscription($user){
        try{

            $nom=$user->getNom();
            $prenom=$user->getPrenom();
            $mail=$user->getMail();
            $password=$user->getPassword();
            $numTelephone=$user->getNumTelephone();
            $dateNaissance=$user->getDateNaissance();
            $role=$user->getRole();

            $db=config::getConnexion();

            $query2=$db->prepare('INSERT INTO PERSONNE (mail,password) values (:mail, :password)');
            $query2->bindValue(':mail',$mail);
            $query2->bindValue(':password',$password);
            $query2->execute();

            $query3=$db->prepare('SELECT MAX(idp) FROM PERSONNE');//reqt
            $query3->execute();
            $p=$query3->fetch();

            $query=$db->prepare('INSERT INTO USER (idp ,nom, prenom,num_telephone,date_naissance,role) values (:idp,:nom, :prenom,:numtelephone, :datenaissance, :role )');
            $query->bindValue(':idp',$p['MAX(idp)']);
            $query->bindValue(':nom',$nom);
            $query->bindValue(':prenom',$prenom);
            $query->bindValue(':numtelephone',$numTelephone);
            $query->bindValue(':datenaissance',$dateNaissance);
            $query->bindValue(':role',$role);
            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    public function afficherProf(){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM personne,user where personne.idp = user.idp and user.role= "Prof" ');//reqt
            $query->execute();
            return $query->fetchAll();//return ligne dan requette de bd
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function afficherAdherent(){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM personne,user where personne.idp = user.idp and user.role= "Adherent" ');//reqt
            $query->execute();
            return $query->fetchAll();//return ligne dan requette de bd
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function findUser($idp){
        try{
            $db=config::getConnexion();

            $query=$db->prepare('SELECT * FROM personne,user where personne.idp= :idp');//reqt
            $query->bindValue(':idp',$idp);
            $query->execute();
            return $query->fetchAll();//return ligne dan requette de bd

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function modifierUser($id,$user){
        try{

            $nom=$user->getNom();
            $prenom=$user->getPrenom();
            $mail=$user->getMail();
            $password=$user->getPassword();
            $numTelephone=$user->getNumTelephone();
            $dateNaissance=$user->getDateNaissance();

            $db=config::getConnexion();
            $query2=$db->prepare('UPDATE PERSONNE SET mail= :mail,password= :password where idp= :idp');

            $query2->bindValue(':mail',$mail);
            $query2->bindValue(':password',$password);
            $query2->bindValue(':idp',$id);

            $query2->execute();



            $query=$db->prepare('UPDATE USER SET nom= :nom, prenom= :prenom, num_telephone= :numtelephone,date_naissance= :datenaissance WHERE idp= :idp');//reqt

            $query->bindValue(':idp',$id);
            $query->bindValue(':nom',$nom);
            $query->bindValue(':prenom',$prenom);
            $query->bindValue(':numtelephone',$numTelephone);
            $query->bindValue(':datenaissance',$dateNaissance);
            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function modifierUser2($id,$user){
        try{
            $nom=$user->getNom();
            $prenom=$user->getPrenom();
            $mail=$user->getMail();
            $password=$user->getPassword();
            $numTelephone=$user->getNumTelephone();

            $db=config::getConnexion();
            $query2=$db->prepare('UPDATE PERSONNE SET mail= :mail,password= :password where idp= :idp');

            $query2->bindValue(':mail',$mail);
            $query2->bindValue(':password',$password);
            $query2->bindValue(':idp',$id);

            $query2->execute();



            $query=$db->prepare('UPDATE USER SET nom= :nom, prenom= :prenom, num_telephone= :numtelephone WHERE idp= :idp');//reqt

            $query->bindValue(':idp',$id);
            $query->bindValue(':nom',$nom);
            $query->bindValue(':prenom',$prenom);
            $query->bindValue(':numtelephone',$numTelephone);
            $query->execute();


        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    public function deleteUser($idp){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('DELETE FROM PERSONNE WHERE idp= :idp');//reqt
            $query->bindValue(':idp',$idp);
            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function connexionUser($email,$password){
        $sql="SELECT * FROM PERSONNE,USER WHERE PERSONNE.mail='" . $email . "' and PERSONNE.Password = '". $password."' and PERSONNE.idp= USER.idp";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
           if ($count=$query->rowCount()>0){
               return $query->fetchAll();
           }
        }
        catch (Exception $e){
                $message= " ".$e->getMessage();
        }

        $sql2="SELECT * FROM PERSONNE,ADMIN WHERE PERSONNE.mail='" . $email . "' and PERSONNE.Password = '". $password."' and PERSONNE.idp= ADMIN.idp";
        try{
            $query2=$db->prepare($sql2);
            $query2->execute();
            if ($count=$query2->rowCount()>0){
                return $query2->fetchAll();
            }
        }
        catch (Exception $e){
            $message= " ".$e->getMessage();
        }

      return "false";
    }

    public function recupererpassword($email){

        $sql="SELECT * FROM PERSONNE WHERE mail='" . $email . "'";
        $db = config::getConnexion();
        $message2="";
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $count=$query->rowCount();
            if($count==0) {
                $message2 = "mail introuvable";
            } else {
                $x=$query->fetchAll();
               foreach ($x as $row){
                $from = "tabaani222@gmail.com";
                $to = $row['mail'];
                $subject = "Password";
                $message = "votre mot de passe est : ".$row['password'];
                $headers = "From:" . $from;
                mail($to, $subject, $message, $headers);
               }
            }
        }
        catch (Exception $e){
            $message2= " ".$e->getMessage();
        }
    return $message2;

    }

}

?>
