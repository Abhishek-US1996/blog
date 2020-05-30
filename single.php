<?php 

  include('includes/header.php'); 

  if(isset($_GET['post'])){
    $id = mysqli_real_escape_string ($db , $_GET['post'] );
    $query = "SELECT * FROM posts WHERE id='$id'";
  }else{
    $query = "SELECT * FROM posts";
  }

  $posts = $db->query($query);

?>

  <br>

  <?php if($posts->num_rows >0) { 
        while ($row = $posts->fetch_assoc()){
        ?>
      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $row['title'] ?></h2>
        <p class="blog-post-meta"><?php echo $row['date'] ?> by <a href="#"><?php echo $row['author'] ?></a></p>
        <?php echo $row['body']; ?>
      </div><!-- /.blog-post -->
      <?php } } ?>


      <?php include('includes/sidebar.php'); ?>
</div><!-- /.blog-post -->

    </div><!-- /.blog-main -->

    <?php include('includes/footer.php'); ?>