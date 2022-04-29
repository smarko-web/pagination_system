<?php

include("config.php");

function paginatePosts($currentPage = 1, $recordsPerPage = 4)
{
    global $conn;
    // write query
    //offset: 0, 4, 8, 12, 16, 20, .....
    $sql = "SELECT * FROM posts LIMIT :offset,:numberOfRecords";
    $data = [
        'offset' => ($currentPage - 1) * $recordsPerPage,
        'numberOfRecords' => $recordsPerPage
    ];
    //prepare
    $stmt = $conn->prepare($sql);
    //execute query
    $stmt->execute($data);
    $numberOfPages = ceil(totalRows() / $recordsPerPage);

    $posts = $stmt->fetchAll();

    return [
        'posts' => $posts,
        'prevPage' => $currentPage > 1 ? $currentPage - 1 : false,
        'nextPage' => $currentPage + 1 <= $numberOfPages ? $currentPage + 1 : false,
        'numberOfPages' => $numberOfPages
    ];
}

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$pageData = paginatePosts($currentPage, 5);
//$pageData = paginatePosts($currentPage); uses the default numberOfRecords defined on line 5 
$pageNumbers = getPaginationNumbers($currentPage, $pageData['numberOfPages']);

if (isset($_GET['page']) && isset($_GET['ajax'])) {
    $posts = paginatePosts($_GET['page']);
    echo json_encode($posts);
    exit();
}