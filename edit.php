<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'classes/user.php';

$objUser = new User();
// GET
if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $stmt = $objUser->runQuery("SELECT * FROM crud_users WHERE id=:id");
    $stmt->execute(array(":id" => $id));
    $rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
  $id = null;
  $rowUser = null;
}

// POST
if(isset($_POST['btn_save'])){
  $name   = strip_tags($_POST['name']);
  $email  = strip_tags($_POST['email']);
  $address  = strip_tags($_POST['address']);
  $phone  = strip_tags($_POST['phone']);

  try{
     if($id != null){
       if($objUser->update($name, $email, $id, $address, $phone)){
         $objUser->redirect('index.php?updated');
       }
     }else{
       if($objUser->insert($name, $email, $address, $phone)){
         $objUser->redirect('index.php?inserted');
       }else{
         $objUser->redirect('index.php?error');
       }
     }
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'parts/head.php'; ?>
    </head>
    <body>
        <!-- Header banner -->
        <?php require_once 'parts/header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar menu -->
                <?php require_once 'parts/sidebar.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  <h1 style="margin-top: 10px">Edit Data</h1>
                  <p>Required fields are in (*)</p>
                  <form  method="post">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input  class="form-control" type="text" name="name" id="name" placeholder="Nama Lengkap Anda" value="<?php print($rowUser['name']); ?>" required maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input  class="form-control" type="text" name="email" id="email" placeholder="user@gmail.com" value="<?php print($rowUser['email']); ?>" required maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input  class="form-control" type="text" name="address" id="address" placeholder="Alamat Rumah Anda" value="<?php print($rowUser['address']); ?>" required maxlength="300">
                    </div>
                    <div class="form-group">
                        <label for="address">Nomor HP</label>
                        <input  class="form-control" type="tel" name="phone" id="phone" placeholder="+62xxxxxxxxxxx" value="<?php print($rowUser['phone']); ?>" required maxlength="15">
                    </div>
                    <input class="btn btn-primary mb-2" type="submit" name="btn_save" value="Save">
                  </form>
                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'parts/footer.php'; ?>
    </body>
</html>
