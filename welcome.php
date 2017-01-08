<?php
   include "session.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <h1>Hello <?php echo $login_session; ?> ! Welcome to the first admin-panel))))</h1> 
        <h2><a href = "logout.php">Sign Out</a></h2>
        <a href="index.php">HOME</a>
      </div>
    </div>
  </div>
</body>
</html>