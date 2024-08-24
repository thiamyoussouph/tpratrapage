
<?php
session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
require 'basededonne.php';
$id=strip_tags($_GET['id']);
$sql="DELETE FROM produit WHERE id=:id";
$query=$conn->prepare($sql);
$query->bindValue(':id',$id,PDO::PARAM_INT);
$query->execute();
$_SESSION['message']="produit supprimé avec succés";
header('location:listproduit.php');

}
  





?>