<?php

include "AmazonApi.php";

$amazon = new AmazonApi(file_get_contents('https://www.amazon.com/s?k=Computer'));

echo $amazon->getResultsSum();

?>
