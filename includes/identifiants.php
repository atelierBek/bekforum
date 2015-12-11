<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=bekforum', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
