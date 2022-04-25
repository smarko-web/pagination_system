<?php include("../postControler.php");?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page-numbers</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style.css">
        <style>
            .pagination-links {
                justify-content: center;
            }
            .pagination-links .btn {
                padding: 8px 12px;
                margin: 6px;
            }
            .btn.hidden {
                display: none;
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
        <a class="btn <?php echo !$pageData['prevPage'] ? 'hidden' : '' ?>" href="index.php?page=<?php echo $pageData['prevPage'] ?>">◀︎</a>
         <?php foreach ($pageNumbers as $page): ?>
            <?php if ($page == $currentPage || $page == '...') : ?>
                <a class="btn disabled" href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a>
            <?php else : ?>
                <a class="btn" href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?> 
        <a class="btn <?php echo !$pageData['nextPage'] ? 'hidden' : '' ?>" href="index.php?page=<?php echo $pageData['nextPage'] ?>">▶︎</a>

        <?php// text($pageNumbers); ?>
        </div>

      </div>

    </body>
</html>