<?php

   $connection = mysqli_connect('localhost','root','','blog_db');

   if(isset($_POST['send'])){
      $posted_by = $_POST['posted_by'];
      $title = $_POST['title'];
      $content = $_POST['content'];
      

      $request = " insert into create_blog(posted_by, title, content) values('$posted_by','$title','$content') ";
      mysqli_query($connection, $request);

      header('location:create_blog.html'); 

   }else{
      echo 'something went wrong please try again!';
   }

?>