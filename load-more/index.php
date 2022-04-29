<?php include("../postControler.php");?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Load-More</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style.css">
        <style>
            .pagination-links {
                justify-content: center;
            }
         
        </style>

    </head>
    <body>
      <div class="page-wrapper">

        <div class="post-list">
            <h1 class="text-center">Posts</h1>
            <?php foreach ($pageData['posts'] as $post): ?>
            <article>
                <h3><?php echo $post['title']; ?></h3>
            </article>
            <?php endforeach; ?>

        </div>
        <div class="pagination-links">
            <button type="button" class="btn load-more-btn">Load more</button>
       
        </div>

      </div>

      <script src="load_more.js"></script>

    </body>
</html>