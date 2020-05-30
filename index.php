<?php 

  include('includes/header.php'); 

  if(isset($_GET['catogery'])){
    $catogery = mysqli_real_escape_string ($db , $_GET['catogery'] );
    $query = "SELECT * FROM posts WHERE catogery='$catogery'";
  }else{
    $query = "SELECT * FROM posts";
  }

  $posts = $db->query($query);

?>

<main role="main" class="container" style="margin-top:50px;">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        From the Firehose
      </h3>
      <?php if($posts->num_rows >0) { 
        while ($row = $posts->fetch_assoc()){
        ?>
      <div class="blog-post">
        <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
        <p class="blog-post-meta"><?php echo $row['date'] ?> by <a href="#"><?php echo $row['author'] ?></a></p>
        <?php $body = $row['body']; 
          echo substr($body , 0 , 400) . "....";
        ?>
        <a href="<?php echo $row['id'] ?>" class="btn btn-primary">Read More</a>
      </div><!-- /.blog-post -->
      <?php } } ?>
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav>

    </div><!-- /.blog-main -->

    <?php include('includes/sidebar.php'); ?>
    
  </div><!-- /.row -->

</main><!-- /.container -->

    <?php include('includes/footer.php'); ?>