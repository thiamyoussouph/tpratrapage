
<?php
session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
require 'basededonne.php';
$id=strip_tags($_GET['id']);
$sql="SELECT * FROM produit WHERE id=:id";
$query=$conn->prepare($sql);
$query->bindValue(':id',$id,PDO::PARAM_INT);
$query->execute();
$result=$query->fetch(PDO::FETCH_ASSOC);
if(!$result){
    $_SESSION['erreur']="produit introuvable";
    header('location:listproduit.php');
}

}
?>
<p><?=$result['id'] ?></p>
<p><?=$result['nom'] ?></p>
<p><?=$result['categorie'] ?></p>
<p><?=$result['prix'] ?></p>