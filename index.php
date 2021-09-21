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
  <h1 class="headingText">Welcome to Educare</h1>
</div>


<?php include "db.php";
if(isset($_POST["registerButton"])){
  $name = mysqli_real_escape_string($connection,$_POST['username']);
  $email = mysqli_real_escape_string($connection,$_POST['emailId']);
  $number = mysqli_real_escape_string($connection,$_POST['contactNumber']);
  $password = mysqli_real_escape_string($connection,$_POST['password']);
  $re_password = mysqli_real_escape_string($connection,$_POST['re_password']);

  $hash_format = "$2y$10$";
  $hashSalt = "thisismywayforpassword24";
  $hashFormatSalt = $hash_format . $hashSalt;
  $password = crypt($password,$hashFormatSalt);
  $re_password = crypt($re_password,$hashFormatSalt);

  $checkEmail = "SELECT * FROM user_register WHERE email_id='$email'";
  $checkEmailQuery = mysqli_query($connection,$checkEmail);
  $emailOccurence = mysqli_num_rows($checkEmailQuery);

  if($emailOccurence>0){
    ?>
    <script>
      alert("Email already exists");
    </script>
    <?php
  } elseif($password==$re_password){
    $registerInsert = "INSERT INTO user_register (username,email_id,contact_number,password,re_password) VALUES ('$name','$email','$number','$password','$re_password')";
    $registerInsertQuery = mysqli_query($connection,$registerInsert);

    if($registerInsertQuery){
      ?> <script>
        location.replace("login.php");
      </script>
      <?php
    } else {
      ?> <script>
        alert("Sorry try again");
      </script>
      <?php
    }
  } else {
    ?>
    <script>
      alert("Password are not same");
    </script>
    <?php
  }
}
?>






 <div class="registerForm" >
       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
         <table class="indexTable">
           <tr align="left">
             <td > <h1 class="indexLabel">Name: </h1> </td>
             <td><input class="indexInput" type="text" name="username" required autocomplete="off"></td>
           </tr>
           <tr align="left">
             <td> <h1 class="indexLabel">Email Id: </h1> </td>
             <td><input class="indexInput" type="email" name="emailId" required autocomplete="off"></td>
           </tr>
           <tr align="left">
             <td> <h1 class="indexLabel">Contact Number: </h1> </td>
             <td><input class="indexInput" type="number" name="contactNumber" required autocomplete="off"></td>
           </tr>
           <tr align="left">
             <td> <h1 class="indexLabel">Password: </h1> </td>
             <td><input class="indexInput" type="password" name="password" required autocomplete="off"></td>
           </tr>
           <tr align="left">
             <td> <h1 class="indexLabel">Re Password: </h1> </td>
             <td><input class="indexInput" type="password" name="re_password" required autocomplete="off"></td>
           </tr>
           </table>

           <button type="submit" name="registerButton" class="submitBtn">Register Here</button>

     </form>
     <p class="userPara">Already a user? <a class="userLogin" href="login.php">Sign In here </a> </p>
     </div>

     <!-- Footer -->
     <div class="footerDiv" style="position:fixed; bottom:0;">
       <p class="footerHeading">Educare © 2021</p>
       <p class="footerPara">Contact us: educare123@gmail.com</p>
     </div>
   </body>
 </html>
