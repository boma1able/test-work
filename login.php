<?php
   include "config.php";
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
 

 
 
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="enter-body" >
        <img  class="img-responsive" src="img/boy.jpg" alt="image">
         <div>
            <div>
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box">
                  <label>Password  :</label><input type = "password" name = "password" class = "box">
                  <input class="sub-btn" type = "submit" value = " Submit ">
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>
         </div>
      </div>
    </div>
  </div>
</div>
	
</body>
</html>

   

