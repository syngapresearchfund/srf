#!/bin/bash

RED="\033[1;31m"
GREEN="\033[1;32m"
YELLOW="\033[1;33m"
NOCOLOR="\033[0m"
currentdir=${PWD##*/}

if [ ! -d ./dist ]; then
	echo "The /dist directory was not found. Creating directory..."
	mkdir dist
fi

if [ ! -f ./dist-exclude.txt ]; then
	echo "ERROR: You must have the exclude file present in the this directory."
	exit 1
fi

echo "${GREEN}Syncing dist files...${NOCOLOR}"
rm -r ./dist/*
rm ./srf-theme.zip
rsync -avzu --delete --progress -h --exclude-from="dist-exclude.txt" ./* ./dist

echo "${GREEN}Syncing complete.${NOCOLOR}"
echo "${GREEN}Building zip file...${NOCOLOR}"
zip -r ./srf-theme.zip ./dist

echo "${GREEN}Complete! Upload the ./srf-theme.zip file to your Themes in wp-admin.${NOCOLOR}"