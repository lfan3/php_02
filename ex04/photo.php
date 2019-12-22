#!/usr/bin/php
<?php

function get_img_url($site_url){
    $file = file_get_contents($site_url,true);
    $pattern = '/(<img)(\s.*)(src=\")(.*?)(\")/i';
    preg_match_all($pattern, $file, $imglinks);
    return ($imglinks[4][0]);
}

function get_folder_name($site_url){
    preg_match("/[^https*?:\/\/](\w+.)+/", $site_url, $matchs);
    $dir = $matchs[0];
    return ($dir);
}

function grab_image($imgUrl,$dir){
    $ch = curl_init ($imgUrl);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(is_dir("$dir")){
        rmdir("$dir");
    }
    mkdir("$dir");
    $my_file = "logo42.svg";
    $fp = fopen($dir . '/' . $my_file, 'wb');
    fwrite($fp, $raw);
    fclose($fp);
}

$img_url = get_img_url($argv[1]);
$dir = get_folder_name($argv[1]);
grab_image($img_url, $dir);
?>
