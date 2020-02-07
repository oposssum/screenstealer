#!/bin/bash

clear

echo -e "\e[36m ____   ___  ____  ____  ____  __\e[0m "
echo -e "\e[36m/ ___) / __)(  _ \/ ___)(_  _)(  )\e[0m"
echo -e "\e[36m\___ \( (__  )   /\___ \  )(  / (_/\ \e[0m"
echo -e "\e[36m(____/ \___)(__\_)(____/ (__) \____/\e[0m"
echo -e "\e[34;1mWelcome to Screenstealer\e[0m"
echo ""
echo "Enter Go to start or anything else to exit"

read x
case $x in
	"Go") echo -e "\e[4mCTRL+C\e[0m to stop"; php scr.php;;
	"go") echo -e "\e[4mCTRL+C\e[0m to stop"; php scr.php;;
	*) clear;;
esac
