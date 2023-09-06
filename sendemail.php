<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once '../../model/phpmailer/Exception.php';
require_once '../../model/phpmailer/PHPMailer.php';
require_once '../../model/phpmailer/SMTP.php';

error_reporting (E_ALL ^ E_NOTICE);

//emails
 $db = config::getConnexion();
 $sql = "SELECT *
 FROM user
 INNER JOIN personne ON user.idp = personne.idp
 where role='Adherent'  ";
 $liste= $db->prepare($sql);
 $liste->execute();
 $lista =  $liste->fetchAll(PDO::FETCH_ASSOC);




$mes="Notification de Zeryeb (a propos de cours)";
$head="";
$check=0;
$Ajouter = htmlentities($_POST['Ajouter']);
$modifier = htmlentities($_POST['modifier']);
$idss = htmlentities($_POST['coursid']);
$suprrimer = htmlentities($_POST['suprrimer']);

if ($Ajouter=="ff"){
$check=1;
$head="Un nouveau cours a été ajouté.";
}

if ($modifier=="sd"){
$check=1;
$me= htmlentities($_POST['type']);
$head="Le cours de $me a été modifié.";
}

$mail = new PHPMailer(true);

$alert = '';

if($check==1){
  try{

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'projetweb982@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'lth12012321232'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('projetweb982@gmail.com'); // Gmail address which you used as SMTP server

    foreach ($lista  as $value):
    $mail->addAddress($value['mail']); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
     endforeach;
    $mail->isHTML(true);
    $mail->Subject = $mes;
    $mail->Body = "
    <div style='font-size: 25px; color:black;'><h3>$head<br><a href='http://localhost/pweb/views/calendarforemail.php?id=$idss'>vérifier le calendrier</a><br>Aouadi Mohamed.</h3></div>";

    $mail->send();
    $alert = '<div id="hideMe" class="alert-success">
                 <span>Message envoyé! Merci de nous contacter.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div id="hideMe" class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }

}
?>
