#!/bin/bash
HOUR=`date +%H`
HOUR=17
r=$(( $RANDOM % 8 )); 

if [ "$HOUR" -gt 8 ] && [ "$HOUR" -lt 18 ]; then
  if [ $r -eq 0 ]; then
    ./slogen.php data/mgt-sprech.txt --hashtag --twitterlimit | twitter set
  fi
fi
