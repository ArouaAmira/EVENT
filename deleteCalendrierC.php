<?PHP
	include "CalendrierC.php";
require('../config.php');
	$calendrierC=new CalendrierC();

	if (isset($_GET["id"])){

		$calendrierC->supprimerCalendrier($_GET["id"]);
		header('Location:../views/admin/table.php');
	}



?>
