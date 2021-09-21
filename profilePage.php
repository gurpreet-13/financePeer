<?php
session_start();

 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Profile Page</title>
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
<div style="margin-top:150px; text-align:center;">
  <h1 class="headingText">Your Profile</h1>
</div>
     <?php include "db.php";

     $profileQuery = "SELECT * FROM user_register WHERE user_id='{$_SESSION['user_id']}'";
     $profileResult = mysqli_query($connection,$profileQuery);

     while($row = mysqli_fetch_assoc($profileResult)){
       $fullName = $row['username'];
       $emailId = $row['email_id'];
       $contactNumber = $row['contact_number'];
       ?>
       <table>
         <tr>
           <td><h1 class="indexLabel">Name: </h1></td>
           <td><h1 class="indexLabel"> <?php echo "$fullName" ?></h1></td>
         </tr>
         <tr>
           <td><h1 class="indexLabel">Email: </h1></td>
           <td> <h1 class="indexLabel"> <?php echo "$emailId" ?></h1></td>
         </tr>
         <tr>
           <td><h1 class="indexLabel">Contact Number: </h1></td>
           <td><h1 class="indexLabel"> <?php echo "$contactNumber" ?></h1></td>
         </tr>
       </table>
     <?php } ?>
      <a href="jsonTable.php" ><button type="button" class="submitBtn">Check Json Data</button></a>
     <a href="logout.php" ><button name="logout" type="button" class="submitBtn">Logout</button></a>


<?php include "db.php";
if(isset($_POST["logout"])){
  $deleteQuery = "DELETE FROM carttable WHERE user_id='{$_SESSION['user_id']}'";
  $deleteResult = mysqli_query($connection,$deleteQuery);

  if($deleteResult){
    ?> <script>
      location.replace("login.php");
    </script>
  <?php } else{
    die('failure' . mysqli_error());
  }
}

 ?>
     <!-- Footer -->
     <div class="footerDiv" style="position:fixed; bottom:0;">
       <p class="footerHeading">Educare © 2021</p>
       <p class="footerPara">Contact us: educare123@gmail.com</p>
     </div>
   </body>
 </html>
