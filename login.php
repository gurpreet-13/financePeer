<?php
session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Login Page</title>
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
       <h1 class="headingText">Login page</h1>
     </div>

     <?php include "db.php";
       if(isset($_POST['loginButton'])){
         $emailId = $_POST['emailId'];
         $password = $_POST['password'];

         $signInUser = "SELECT * FROM user_register WHERE email_id='$emailId'";
         $signInUserQuery = mysqli_query($connection,$signInUser);
         $fetchEmail = mysqli_num_rows($signInUserQuery);

         if($fetchEmail){
           $emailUser = mysqli_fetch_assoc($signInUserQuery);
           $dbPassword = $emailUser['password'];
           $_SESSION['user_id'] = $emailUser['user_id'];

           $passwordVerification = password_verify($password,$dbPassword);

           if ($passwordVerification) {
           echo "login successful";
           ?>
           <script>
             location.replace("homePage.php");
           </script>
       <?php  } else {
         ?> <script>
           alert("Incorrect password");
         </script>
       <?php }
       } else {
         ?> <script>
           alert("Incorrect email id");
         </script>
       <?php
       }
       }


       ?>
       <div class="registerForm">


     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
       <table class="indexTable" style="margin-top:150px">
         <tr align="left">
           <td> <h1 class="indexLabel">Email Id:</h1> </td>
           <td><input class="indexInput" type="text" name="emailId" required autocomplete="off"></td>
         </tr>
         <tr align="left">
           <td> <h1 class="indexLabel">Password:</h1> </td>
           <td><input class="indexInput" type="password" name="password" required autocomplete="off"></td>
         </tr>
       </table>

    <button type="submit" name="loginButton" class="submitBtn">Login</button>

     </form>

     <p class="userPara">New user?<a class="userLogin" href="index.php">Register here </a> </p>
   </div>
     <!-- Footer -->
     <div class="footerDiv" style="position:fixed; bottom:0;">
       <p class="footerHeading">Educare © 2021</p>
       <p class="footerPara">Contact us: educare123@gmail.com</p>
     </div>
   </body>
 </html>
