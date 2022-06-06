#!/bin/bash

for LINK in $(cat gov_links.txt)
do
	curl -s $LINK >/dev/null && echo $LINK
done
