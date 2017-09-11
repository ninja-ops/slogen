#!/usr/bin/env php
<?php

function _usage() {
  echo "usage: slogen.php filename.txt\n\n";
  echo "options:\n";
  echo "--hashtag  // add #\n";
  echo "--twitterlimit // limits to 140 chars\n";
  echo "\n";
}

if (
     (in_array("--help", $argv)) || (in_array("-h", $argv))
   ) {
  _usage();
  exit();
}

if (!isset($argv[1])) {
  _usage();
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

$output = implode(' ', $parts);
if (in_array("--twitterlimit", $argv)) {
  if (strlen($output) > 140) {
    $output = "";
  }
}

if (in_array("--hashtag", $argv)) {
  $chunks = explode(" ", $output);
  for ($i=1;$i<count($chunks);$i++) {
    if (substr($chunks[$i], 0, 1) == strtoupper(substr($chunks[$i], 0, 1))) {
      $chunks[$i] = "\\#" . $chunks[$i];
    }
  }
  $output = implode(' ', $chunks);
}

echo $output;
