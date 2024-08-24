<?php
session_start();
include 'header.php';
include 'nav.php';
include_once 'basededonne.php';

if(isset($_POST)){
    if(isset($_POST['nom']) && !empty($_POST['nom'])
     &&isset($_POST['categorie']) && !empty($_POST['categorie'])
    &&isset($_POST['prix']) && !empty($_POST['prix'])
    &&isset($_POST['quantite']) && !empty($_POST['quantite'])){
        $nom=strip_tags($_POST['nom']);
        $categorie=strip_tags($_POST['categorie']);
        $prix=strip_tags($_POST['prix']);
        $quantite=strip_tags($_POST['quantite']);

        $sql="INSERT INTO produit(nom,categorie,prix,quantite) VALUES(:nom,:categorie,:prix,:quantite)";
        $query=$conn->prepare($sql);
        $query->bindValue(':nom',$nom,PDO::PARAM_STR);
        $query->bindValue(':categorie',$categorie,PDO::PARAM_STR);
        $query->bindValue(':prix',$prix,PDO::PARAM_INT);
        $query->bindValue(':quantite',$quantite,PDO::PARAM_INT);
        $query->execute();
        $_SESSION['message']="produit ajouté avec succés";
        header('location:listproduit.php');
    }else{
        $_SESSION['erreur']="les champs sont obligatoires et ne peuvent pas etre vide";
    }
}
?>
<div class="row">

    <div class="col-md-4">

<a href="listproduit.php" class="btn btn-success">retour</a>
    </div>
    <div class="col-md-4 card m-2 bg-info">
    <?php
                   if($_SERVER['REQUEST_METHOD']=='POST'){
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }  }
                ?>  
    <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Non Produit</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom">
    
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">categorie</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="categorie">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">quantité</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="quantite">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">prix</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="prix">
  </div>
 
  <button type="submit" class="btn btn-success">ajouter</button>
</form>
    </div>
   
</div>
<?php

include 'footer.php';

?>