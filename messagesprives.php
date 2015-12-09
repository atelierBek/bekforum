<?php
session_start();
$titre="Messages Privés";
$balises = true;
include("includes/identifiants.php");
include("includes/debut.php");
include("includes/bbcode.php");
include("includes/menu.php");

$action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';


$action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):''; //On récupère la valeur de la variable $action

switch($action)
{
  case "consulter": //1er cas : on veut lire un mp
  //Ici on a besoin de la valeur de l'id du mp que l'on veut lire
  break;

  case "nouveau": //2eme cas : on veut poster un nouveau mp
  //Ici on a besoin de la valeur d'aucune variable :p
  break;

  case "repondre": //3eme cas : on veut répondre à un mp reçu
  //Ici on a besoin de la valeur de l'id du membre qui nous a posté un mp
  break;

  case "supprimer": //4eme cas : on veut supprimer un mp reçu
  //Ici on a besoin de la valeur de l'id du mp à supprimer
  break;

  default; //Si rien n'est demandé ou s'il y a une erreur dans l'url, on affiche la boite de mp.

} //fin du switch
?>
