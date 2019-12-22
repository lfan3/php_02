#!/usr/bin/php
<?php
if($argc!=2 || !file_exists($argv[1]))
    exit();
$fp = fopen($argv[1], "r") or die("Impossible de lire la ligne de commande");
while (!feof($fp)) {
    $line = fgets($fp);
    $line = preg_replace_callback(
        "/<a.*>/",
        function($matches){
            $matches[0] = preg_replace_callback("/(title=\")(.*?)(\")/si", function($matches){
                return ($matches[1].strtoupper($matches[2]).$matches[3]);
            }, $matches[0]);
            $matches[0] = preg_replace_callback("/(>)(.*?)(<)/", function($matches){
                return ($matches[1].strtoupper($matches[2]).$matches[3]);
            }, $matches[0]);
            return $matches[0];
        },
        $line
    );
    echo $line;
}
fclose($fp);
?>