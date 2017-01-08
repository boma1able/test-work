<?php session_start();?>
<?php 

?>
<?php require "config.php";?>



<?php include "includes/header.php";?>     


  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="post">
         
          <?php 
            
            $articles = "SELECT * FROM `articles`";
            if($result = mysqli_query($link, $articles)){
              while ($art = mysqli_fetch_assoc($result)){
                
              ?>  
                <a href="articles.php?id=<?php echo $art['id']; ?>"><h2><?php echo $art['title'];?></h2></a>
                <div class="views"><span class="glyphicon glyphicon-eye-open"><?php echo $art['views']?></span></div>
                <div class="author"><?php echo $art['author']?></div>
                <div class="date"><?php echo $art['pubdate']?></div>
                <img class="img-responsive" src="img/<?php echo $art['image'];?>" alt="image">
                <div class="post-content">
                  <p><?php echo mb_substr($art['text'], 0, 200, 'utf-8') . ' ...'; ?></p>
                </div>
                
            <?php  
              }
            } else {
              echo "123 error";
            }
            
          ?>
            
        </div>


        
        
      </div>
      
<?php include "includes/sidebar.php"?>      
      
      
    </div>
  </div>


<?php include "includes/footer.php";?>










































