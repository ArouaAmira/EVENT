<?php
include "CoursC.php";
require('../config.php');
$coursC=new CoursC();

if (isset($_GET["id"])){
  $oldimage =$coursC->oldPic($_GET["id"]);
  unlink('../views/admin/uploads/' . $oldimage);
  $coursC->supprimerCours($_GET["id"]);
  header('Location:../views/admin/table.php');
}

/*function supprimerImage($id)
{
    $db = config::getConnexion();
    $delete_sql = "SELECT * FROM cours WHERE id=?";
    $delete_stmt = $db->prepare($delete_sql);
    $delete_stmt->bindParam(1, $id);
    $delete_stmt->execute();
    $result = $delete_stmt->fetch();

    unlink('../views/uploads/' . $result['image_src']);

}*/

?>
