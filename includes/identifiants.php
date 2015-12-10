<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=bekforum', 'root', 'a');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>


