<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home</title>

    <!-- swiper css link  -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- header section starts  -->

    <section class="header">
      <a href="home.php" class="logo">ISharepixels.</a>

      <nav class="navbar">
        <a href="home.html">home</a>
        <a href="about.html">about</a>
        <a href="gallery.php">gallery</a>
        <a href="register.php">Register</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>
    </section>



<?php
    session_start();
    error_reporting(0);

    $dir = "gallery/";  // set your gallery folder name

    $username = 'admin';   //set ur username
    $password = 'admin';   //set ur password

    if(isset($_POST['username']))
    {
        $fromuser = $_POST['username']; 
        $frompass = $_POST['password']; 
        if($fromuser==$username || $frompass==$password)
        {
            $_SESSION["access"] = 1;
        }
        else
        {
            echo "Invalid Username or Password";
        }
    }

    if(isset($_GET['del']))
    {
        unlink($dir.'/'.$_GET['del']);
    }

    if(isset($_GET['logout']))
    {
        session_destroy();
    }

    if(isset($_POST['fileupload']))
    {
        $dirfile = $dir.basename( $_FILES['file']['name']);     
        if(move_uploaded_file($_FILES['file']['tmp_name'], $dirfile)) {  
            echo "File uploaded successfully!";  
        } else{  
            echo "Sorry, file not uploaded, please try again!";  
        }  
    }

    $useraccess = $_SESSION["access"];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Albums</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>

<?php if($useraccess!=1){  ?>

<main class="login-form" style="margin-top: 150px;">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login to Admin Panel</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                               
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>

<?php } else { ?>


<main class="login-form" style="margin-top: 50px;">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Images</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="1" name="fileupload">
                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">Select a File</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="file" required autofocus>
                                </div>
                            </div>  
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Upload
                                </button>
                               
                            </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8" style="margin-top:15px;">
                <div class="card">
                    <div class="card-header">My Gallery</div>
                    <div class="card-body">
                         <div class="row">
                           <?php
                            
                            if (is_dir($dir)){
                              if ($dh = opendir($dir)){
                                while (($file = readdir($dh)) !== false){
                                   if($file=="." OR $file==".."){} else { 

                                  ?>
                                 
                     
                                       <div class="col-md-3">
                                      <img src="<?php echo $dir; ?>/<?php echo $file; ?>" width="100%" class="img-thumbnail">
                                      <a href="?del=<?php echo $file; ?>" onclick="return confirm('Are you sure you want to delete this item?');"> Delete </a>
                                      </div>
                                    
                                 <?php
                                  }
                                }
                                closedir($dh);
                              }
                            } ?>
                           </div>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        </div>

</main>
 <center> <br> <a href="?logout=1" > Logout From Admin </a> </center>

<? } ?>

</body>
</html>