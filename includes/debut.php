<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<?php
echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> Bek Forum </title>';
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!-- Utilise CSS 
<link rel="stylesheet" type="text/css" href="style/style.css">-->

<!-- Utilise LESS -->
<link rel="stylesheet/less" type="text/css" href="style/style.less">

<!--LESS-->
<script src="./scripts/less.min.js" type="text/javascript"></script>

<?php
$balises=(isset($balises))?$balises:0;
if($balises)
{
  echo '<script type="text/javascript" src="scripts/script.js"></script>';
}
?>
</head>
<?php

// DEBUG
ini_set('display_startup_errors', '1');
ini_set('display_errors','1');

//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

//On inclue les 2 pages restantes
include("function.php");
include("constants.php");
?>
