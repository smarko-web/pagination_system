<?php

$user = "root";
$pass = "";
$host= "localhost";
$dbname= "pagination";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


function totalRows() {
   global $conn;
   $sql = "SELECT COUNT(*) as total FROM posts";
   $posts = $conn->query($sql)->fetch();
   return $posts['total'];
}

function text($value)//for Testing Purpose 
{
    echo "<pre>". print_r($value, 1). "</pre>";
    die();
}


function getPaginationNumbers($currentPage, $totalNumberOfPage) {
	$current = $currentPage; 
   $last = $totalNumberOfPage;
   $delta = 2;
   $left = $current - $delta;
   $right = $current + $delta + 1;
   $range = array();
   $rangeWithDots = array();
   $l = -1;

   for ($i = 1; $i <= $last; $i++)
	{
      if ($i == 1 || $i == $last || $i >= $left && $i < $right) 
      {
        array_push($range, $i);
      }
   }
   
   for($i = 0; $i<count($range); $i++)
	{
      if ($l != -1) 
      {
         if ($range[$i] - $l === 2) 
         {
            array_push($rangeWithDots, $l + 1);
         } 
         else if ($range[$i] - $l !== 1)
         {
            array_push($rangeWithDots, '...');
         }
      }
      array_push($rangeWithDots, $range[$i]);
      $l = $range[$i];
   }
	return $rangeWithDots;
}
