#!/bin/bash

clear

echo "Welcome to Screenstealer"
echo "Enter Go to start or anything else to exit"
read x
case $x in
	"Go") echo "CTRL+C to stop"; php scr.php;;
	"go") echo "CTRL+C to stop"; php scr.php;;
	*) clear;;
esac
