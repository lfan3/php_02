#!/usr/bin/php
<?php
$result = implode(" ", preg_split('/\s+/', trim($argv[1])));
echo $result."\n";
?>
