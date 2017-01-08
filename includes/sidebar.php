<div class="col-md-4">
  <div class="sidebar">
    <!-- POPULAR POSTS -->
    <div class="popular-post">
      <h3>Popular posts:</h3>
      <?php 
            $articles = "SELECT * FROM articles ORDER BY views DESC LIMIT 3";
            if($result = mysqli_query($link, $articles)){
              while ($art = mysqli_fetch_assoc($result)){
                
              ?> <a href="articles.php?id=<?php echo $art['id']; ?>"><h4><?php echo $art['title'];?></h4></a>
        <div class="author">
          <p>
            <?php echo $art['author']?> <em><?php echo $art['pubdate']?></em></p>
        </div> <img sclass="img-responsive" src="img/<?php echo $art['image'];?>" alt="image">
        <div class="popular-post-content">
          <p>
            <?php echo mb_substr($art['text'], 0, 200, 'utf-8') . ' ...'; ?>
          </p>
        </div>
        <?php  
              }
            } else {
              echo "123 error";
            }
            
          ?>
    </div>
    
    
    
    <!-- fresh comments -->
    <div class="latest-comments">
      <h3>Fresh comments:</h3>
      <?php 
            $comments = "SELECT * FROM comments ORDER BY id DESC LIMIT 5";
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
            <a href="articles.php?id=<?php echo $comments['article_id']; ?>">
              <p>
                  <?php echo $comments['text']; ?>
              </p>
            </a>
          </div>
        </div>
      <?php  
              }
            } else {
              echo "123 error";
            }
      ?>
    </div>
  </div>
</div>