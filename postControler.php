<?php

include("config.php");

function text($value)//for Testing Purpose 
{
    echo "<pre>". print_r($value, 1). "</pre>";
    die();
}

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;


// write query
//offset: 0, 4, 8, 12, 16, 20, .....
$sql = "SELECT * FROM posts LIMIT :offset,:numberOfRecords";
$data = [
    'offset' => ($currentPage - 1) * 4,
    'numberOfRecords' => 4
];
//prepare
$stmt = $conn->prepare($sql);
//execute query
$stmt->execute($data);
$numberOfPages = ceil(totalRows() / 4);

$posts = $stmt->fetchAll();

$pageData = [
    'posts' => $posts,
    'prevPage' => $currentPage > 1 ? $currentPage - 1 : false,
    'nextPage' => $currentPage + 1 <= $numberOfPages ? $currentPage + 1 : false,
];
