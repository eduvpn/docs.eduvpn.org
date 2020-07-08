The [docs.eduvpn.org](https://docs.eduvpn.org) website!

Documentation can be updated from the Git repository using the 
`update-docs.sh` script, it will put the repository in the `documentation/` 
folder.

To install the dependencies:

    $ composer install

Or (when Composer was installed manually):

    $ php /path/to/composer.phar install

To generate the pages:

    $ php bin/generate.php

To view the generated site locally:

    $ firefox output/index.html

To upload to the server (assuming you configured your SSH correctly and have
the right permissions): 

    $ sh upload.sh
