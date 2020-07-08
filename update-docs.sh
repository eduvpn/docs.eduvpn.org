#!/bin/sh
if [ ! -d "documentation" ]
then
    git clone https://github.com/eduvpn/documentation.git
else
    cd documentation
    git pull
fi
