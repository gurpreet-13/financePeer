<?php

session_start();

 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Json table</title>
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



     <div style="text-align:center; margin-top: 50px;">
     <h1 class="headingText">Your results:</h1>
     </div>
     <?php include "db.php";

     $jsonDataInsert = "SELECT * FROM data_json";
     $dataInsertQuery = mysqli_query($connection,$jsonDataInsert);

     while($row=mysqli_fetch_assoc($dataInsertQuery)){
       $user_id = $row['userId'];
       $id = $row['id'];
       $title = $row['title'];
       $body = $row['body'];
?>

<div style="text-align:center;">


  <table id="user_json">
  <tr align="center">
      <th>User Id</th>
      <th>Id</th>
      <th>Title</th>
      <th>Body</th>
  </tr>
<tr align="left">
<td > <?php echo "$user_id" ?> </td>
<td> <?php echo "$id" ?> </td>
<td> <?php echo "$title" ?> </td>
<td> <?php echo "$body" ?> </td>
</tr>
</table>
</div>

<?php } ?>

<!-- Footer -->
<div class="footerDiv" style="position:fixed; bottom:0;">
  <p class="footerHeading">Educare © 2021</p>
  <p class="footerPara">Contact us: educare123@gmail.com</p>
</div>
   </body>
 </html>
