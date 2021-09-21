<?php include "db.php";

if(isset($_SESSION['user_id'])){
  $currentUser = "SELECT * FROM user_register WHERE user_id='{$_SESSION['user_id']}'";
  $currentUserQuery = mysqli_query($connection,$currentUser);

  while($row = mysqli_fetch_assoc($currentUserQuery)){
    $user_name = $row['username'];
    echo " <a href='profilePage.php' style='float:right;'>Welcome,$user_name</a> ";
  }
} else {
  echo " <a href='login.php' style='float:right;'>Your Profile</a> ";
}

 ?>
