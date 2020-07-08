#!/bin/sh
sassc -t expanded css/screen.css css/X
mv css/X css/screen.css
