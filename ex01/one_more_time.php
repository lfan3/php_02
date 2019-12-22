#!/usr/bin/php
<?php
if ($argc < 2)
    exit(0);
date_default_timezone_set('Europe/Paris');
$preg = preg_match('/^(lundi|mardi|mercredi|jeudi|vendredi|samedi|dimanche) ([0-9]{2}) (janvier|fevrier|mars|avril|mai|juin|juillet|aout|septembre|octobre|novembre|decembre) ([0-9]{4}) ([0-9]{2}:[0-9]{2}:[0-9]{2})$/i', $argv[1], $matches);

if (!$preg)
	exit("Wrong Format\n");
$months = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
$month = array_search(strtolower($matches[3]), $months) + 1;
$time = $matches[4] . '-' . $month . '-' . $matches[2] . ' ' . $matches[5];
$time = strtotime($time);

if (!$time || !$preg)
    echo "Wrong Format\n";
else
    echo $time . "\n";