<?php include("postControler.php");?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pagination</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
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
            <?php if ($pageData['prevPage']) : ?>
                <a class="btn" href="index.php?page=<?php echo $pageData['prevPage']; ?>">◀ Prev Page</a>
            <?php else: ?>
               <!--- <a class="btn disabled" href="index.php?page=<?php echo $pageData['prevPage']; ?>">◀ Prev Page</a>--->
               <span></span>
            <?php endif; ?>
            <?php if ($pageData['nextPage']) : ?>
                <a class="btn" href="index.php?page=<?php echo $pageData['nextPage']; ?>">Next Page ▶</a>
            <?php else: ?>
               <!---  <a class="btn disabled" href="index.php?page=<?php echo $pageData['nextPage']; ?>">Next Page ▶</a>--->
               <span></span>
            <?php endif; ?>


        </div>
      </div>
    </body>
</html>