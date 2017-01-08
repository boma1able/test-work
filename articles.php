<?php session_start();?>

<?php require "config.php";
header('Content-Type: text/html; charset=utf-8');
?>

  
<?php include "includes/header.php";?> 
  

  <div class="container">
    <div class="row">
      <div class="col-md-8">
       <!--  whole comments -->
        <div class="whole-post">
         
          <?php 
            
          $article = mysqli_query($link, "SELECT * FROM articles WHERE id = " . (int) $_GET['id']);
          if( mysqli_num_rows($article) <= 0){
            echo "E R R O R!";
          } else {
            $art = mysqli_fetch_assoc($article);
            mysqli_query($link, "UPDATE articles SET views = views + 1 WHERE id = " . (int) $art['id']);
            ?>
            
                <h2><?php echo $art['title'];?></h2>
                <div class="views"><span class="glyphicon glyphicon-eye-open"><?php echo $art['views']?></span></div>
                <div class="author"><?php echo $art['author']?></div>
                <div class="date"><?php echo $art['pubdate']?></div>
                <img class="img-responsive" src="img/<?php echo $art['image'];?>" alt="image">
                <div class="post-content-full">
                  <p><?php echo $art['text']; ?></p>
                </div>
            
            <?php
          }
          ?>
            
        </div>
        
        
      <!--  comments -->
       
    <div class="post-comments">
      <h3>Comments:</h3>
      <?php 
            $comments = "SELECT * FROM comments WHERE article_id = " . (int) $_GET['id'] . " ORDER BY id DESC";
            
            if($result = mysqli_query($link, $comments)){
              while ($comments = mysqli_fetch_assoc($result)){
                
      ?>
        <div class="comm-body">
            <img class="gravatar-img" src="http://gravatar.com/avatar/<?php echo md5($comments['email'])?>?s=125" alt="image">
          <div class="author-comm">
            <p><?php echo $comments['author']?></p>
            <p><em><?php echo $comments['pubdate']?></em></p>
          </div> 
          <div class="comm-text">
              <p><?php echo $comments['text']; ?></p>
          </div>
        </div>
      <?php  
              }
            } else {
              echo "123 error";
            }
      ?>
    </div>
       
       
    <div id="pm" class="post-message">
      <h3>Write a comment:</h3>
     <div class="message-body">
      <form action="articles.php?id=<?php echo $art['id'];?>#pm" method="POST">
       <?php
          if( isset($_POST['do_post']))
          {
            $errors = array();
            
            if( $_POST['name'] == ''){
              $errors[] = 'Enter your name!';
            }
            if( $_POST['email'] == ''){
              $errors[] = 'Enter your email!';
            }
            if( $_POST['text'] == ''){
              $errors[] = 'Enter your text!';
            }
            if( empty($errors) ){
              
              mysqli_query($link, "INSERT INTO comments (author, email, text, pubdate, article_id) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['text']."', NOW(), '".$art['id']."')");
              
              echo "SUCCESS!";
            }else{
              echo $errors['0'];
            }
          }
        ?>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <textarea type="text" name="text" id="" cols="30" rows="10"></textarea>
        <button class="msg-btn" type="submit" name="do_post">send message</button>
      </form>
    </div> 
    </div>   
  
       
       
       
       
       
       
       
        
        
        
      </div>
      
<?php include "includes/sidebar.php"?>      
      
      
    </div>
  </div>


<?php include "includes/footer.php"?>