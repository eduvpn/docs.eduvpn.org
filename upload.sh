#!/bin/sh
rm -rf output
php bin/generate.php
rsync -avzuh -e ssh output/docs/* argon.tuxed.net:/var/www/html/fkooman/docs.eduvpn.org --progress --exclude '.git'
