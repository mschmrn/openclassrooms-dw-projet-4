<?php

$search = 'forest';
$page = 2;
$per_page = 15;
$orientation = 'landscape';

$test = Crew\Unsplash\Search::photos($search, $page, $per_page, $orientation);

var_dump($test[1]["urls"]["regular"])
?>

<div class="container-fluid">
    <img src="<?= $test[1]["urls"]["regular"] ?>" width="500px" height="500px" alt="" >
</div>