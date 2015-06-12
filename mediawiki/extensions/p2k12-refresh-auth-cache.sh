#!/bin/bash

TMPFILE=`mktemp /var/cache/p2k12/p2k12.passwd.XXXXXX`
trap "rm -f $TMPFILE" EXIT
wget -q https://p2k12.bitraf.no/passwd -O"$TMPFILE" 
mv "$TMPFILE" /var/cache/p2k12/p2k12.passwd
