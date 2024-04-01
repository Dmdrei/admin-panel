<?php require '../layout/header.php' ; ?>
<?php require '../../auth/config.php ' ; ?>


<?php 
   if(!isset($_SESSION['AdminName'])){
    header('location:'.ADMINURL.'admins/login-admins.php');
   }
   if(isset($_POST['submit'])){
    if(empty( $_POST['name'])){
       header('location:create-category.php?error= please enter category');
    }else{
      $name = $_POST['name'];
      $stmt= $conn->prepare("INSERT INTO categorie (name) 
        VALUES(:name) ");
        $stmt->execute([
        ':name' => $name ,
          ]);
          header('location:'.ADMINURL.'categories-admins/show-categories.php');
    

    }
   }

?>
       <div class="row pt-5">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Categories</h5>
          <form method="POST" action="create-category.php" enctype="multipart/form-data">
                <!-- Email input -->
                <?php  if(isset($_GET['error'])):?>
                  <p class="alert alert-danger"> <?php echo $_GET['error'] ;?></p>
                  <?php endif ; ?>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require'../layout/footer.php' ; ?>