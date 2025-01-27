<?php
include("connect.php");
error_reporting(0);
session_start();

if($_SESSION['logged'] == true){

    if($_SESSION['user_type'] == 2){
        header("location:admin\home.php");
    }

    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM tbl_useraccounts where user_id = $id";

    $q = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($q)){
        $oldpassworddb = $row['password'];
    }

  if($user_id)
  {
      //user is logged in

      if(isset($_POST['submit']))
      {
        //check fields

        $oldpassword = md5($_POST['oldpassword']);
        $newpassword = md5($_POST['newpassword']);
        $repeatnewpassword = md5($_POST['repeatnewpassword']);


        //check passwords
        if ($oldpassword == $oldpassworddb)
        {
           // check two new passwords
           if ($newpassword == $repeatnewpassword)
           {
              //success
              //change password in db
              $querychange = mysqli_query("
              UPDATE tbl_useraccounts SET password='$newpassword' WHERE user_id='$user_id'");

              session_destroy();
              echo "Your password has been changed<br/>
              <a href='home.php'>Return</a>";

           }
           else
               echo "New passwords doesnt match";


       }
       else
           echo "Old password doesnt match!";



  }
  else
  {

  echo"
  <form action='changepassword.php' method='POST'>
      Old Password: <input type='password' name='oldpassword'><p>
      New Password: <input type='password' name='newpassword'><br>
      Repeat New Password: <input type='password' name='repeatnewpassword'><p>
      <input type='submit' name='submit' value='Change Password'>
  </form>
  ";

    }
}
else 
    die("You must be logged in to change your password");

}else{

    header("location:login.php");
}
?>      
