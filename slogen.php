#!/usr/bin/env php
<?php

if (!isset($argv[1])) {
  echo "usage: slogen.php filename.txt\n\n";
  exit(1);
} else {
  if (!is_file($argv[1])) {
    echo "error: file '" . $argv[1] . "' not found\n";
    exit(1);
  }
  $txt = file_get_contents($argv[1]);
}
$txt = str_replace("\r", "", $txt);
$txt = trim($txt);

$chunks = explode("\n\n", $txt);
$parts = array();

foreach($chunks as $chunk) {
  $words = explode("\n", $chunk);
  $parts[] = $words[rand(0, count($words)-1)];
}

echo implode(' ', $parts);
