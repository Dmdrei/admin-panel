<?php require '../layout/header.php' ; ?>
<?php require '../../auth/config.php ' ; ?>

<?php 

if(!isset($_SESSION['AdminName'])){
  header('location:'.ADMINURL.'admins/login-admins.php');
}


 if(isset($_GET['id'])){
  $id = $_GET['id'];
  $delete = ("DELETE  FROM categorie WHERE id = ' $id' ");
  $conn->exec($delete);
  header('location:show-categories.php'); 
 }
?>

 <?php require'../layout/footer.php' ; ?>