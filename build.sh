#!/bin/bash

RED="\033[1;31m"
GREEN="\033[1;32m"
YELLOW="\033[1;33m"
NOCOLOR="\033[0m"
currentdir=${PWD##*/}

if [ -d ./srf ]; then
	echo "Removing old build dir..."
	rm -r ./srf
else
	echo "Creating a new build directory..."
	mkdir srf
fi

if [ ! -f ./build-exclude.txt ]; then
	echo "ERROR: You must have the exclude file present in the this directory."
	exit 1
fi

echo "${GREEN}Syncing srf files...${NOCOLOR}"
if [ -f ./srf-theme.zip ]; then
	rm ./srf-theme.zip
fi
rsync -avzu --delete --progress -h --exclude-from="build-exclude.txt" ./* ./srf

echo "${GREEN}Syncing complete.${NOCOLOR}"
echo "${GREEN}Building zip file...${NOCOLOR}"
zip -r ./srf-theme.zip ./srf

echo "${GREEN}Cleaning up...${NOCOLOR}"
rm -r ./srf

echo "${GREEN}Complete! Upload the ./srf-theme.zip file to your Themes in wp-admin.${NOCOLOR}"