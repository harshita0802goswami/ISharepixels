<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   



<section class="header">

   <a href="home.html" class="logo">ISharepixels.</a>
   <nav class="navbar">
        <a href="home.html">home</a>
        <a href="about.html">about</a>
        <a href="admin.php">Upload</a>
        <a href="">Register</a>
      </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>



<?php
    $dir ="gallery/"; // image folder name
      if (is_dir($dir)){
         if ($dh = opendir($dir)){
                 while (($file = readdir($dh)) !== false){
                    if($file=="." OR $file==".."){} else { 

              ?>   <!---- its a loop [change the folder name on img path]----->                
                         <img  style="width: 260px;" src="gallery/<?php echo $file; ?>"> 
             <?php
              }
             }
         closedir($dh);
         }
      } ?>