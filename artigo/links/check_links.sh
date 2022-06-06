#!/bin/bash

for LINK in $(cat api_links.txt)
do
	curl -s $LINK >/dev/null && echo $LINK
done
