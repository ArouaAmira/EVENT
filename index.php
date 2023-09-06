<?php
session_unset();
require_once 'controller/abonnementController.php';
$controller = new abonnementController();
?>
<!--</body>-->
<!DOCTYPE html>
<html>
<head>
    <title>zeryeb</title>
    <link rel="stylesheet" type="text/css" href="libs/css/style.css">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link href="libs/images/lo9o.png" sizes="128x128" rel="shortcut icon"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
</head>
<body>

<?php
include 'view/header.php'
?>
<?php
include 'view/home.php'
?>



<!-- les events -->

<?php
$controller->mvcHandler();
?>

<?php
include 'view/scripts.php'?>

</body>
</html>
