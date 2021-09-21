

<?php
session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Home Page</title>
     <link rel="stylesheet" href="styles/style.css">

     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
   </head>
   <body style="background-color: #FBF4E9;">

     <div class="navigationBar" style="position:fixed, top:0;">
      <a href="homePage.php"><p style="float:left">Educare</p></a>
       <a href="profilePage.php" style="float:right"><?php include "currentUser.php" ?></a>
     </div>


     <div style="text-align:center; margin-top:100px;">
       <h1 class="headingText">Add your Json file</h1>
     </div>

     <div style="text-align:center; margin-top:150px;">
       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
         <input class="submitBtn" type="file" name="jsonFile" accept=".json" required>
         <br>
         <input class="submitBtn" type="submit" name="submit" value="Submit">
     </form>
 </div>
     <?php
      if(isset($_POST['submit'])){
        include "db_json.php";
      }
?>

      <!-- Footer -->
      <div class="footerDiv" style="position:fixed; bottom:0;">
        <p class="footerHeading">Educare © 2021</p>
        <p class="footerPara">Contact us: educare123@gmail.com</p>
      </div>
   </body>
 </html>
