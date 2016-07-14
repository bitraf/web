# bitraf.no

The code for [Bitraf.no](http://bitraf.no) website.

## Structure

Most of the pages linked on the Bitraf website is actually wiki-pages. For instance [Kontorplasser](https://bitraf.no/wiki/Kontorplasser), [Foreningen](https://bitraf.no/wiki/Foreningen) and [Sponsorer](https://bitraf.no/wiki/Sponsorer). These you can edit using Mediawiki web interface once you have [logged in](https://bitraf.no/mediawiki/index.php?title=Spesial:Logg_inn).

However, the pages with dynamic content are stored here. For instance the frontpage ([index.php](https://github.com/bitraf/web/blob/master/index.php)), the gallery ([galleri.php](https://github.com/bitraf/web/blob/master/galleri.php))

## Making changes

You can use the Github webinterface to make changes. This is recommended for simple cases, like fixing a typo or improving the text.

First, [log into or sign up](github.com/login) to Github.

When logged in you can click [any file](https://github.com/bitraf/web/tree/master/) in this repository,
and then hit the *pencil icon* on the file toolbar to edit. More documentation [here](https://help.github.com/articles/editing-files-in-your-repository/).

To edit the frontpage, here is link to edit [index.php](https://github.com/bitraf/web/edit/master/index.php)

One you have made the change, add a description of what you did "Fixed typo", and hit *Commit*.

## Deploy changes

[TODO: automate deployment](https://github.com/bitraf/web/issues/6)

Log in to the server

    ssh bitraf.no

Pull the changes into staging

    cd /home/bitweb/web/staging
    git pull

Check on staging that everything looks good: https://bitraf.no:4433/

    # all good?
  
Pull the changes into live

    cd /home/bitweb/web/staging
    git pull
  
Double-check the changes on live site: https://bitraf.no


## Using your own clone (advanced)

The steps above assumes you made the changes directly in the main repository (https://github.com/bitraf/web).
If you used your own clone, you can easily work with it by adding another git remote: `git remote add jonnor MY-CLONE-URL`, and do `git checkout jonnor/mybranch`. NB: Remember to always push your changes to main repo when you're happy with them!


## Server setup

The server is running on a Linode VPS with Debian Jessie.
The webserver used is NGinX, and you will find the most relevant config under `/etc/nginx/sites-available-bitraf`.

There are two versions of this code base served. One for production (https://bitraf.no), and one for staging/testing (https://bitraf.no:4433/). The two repositories are at `/home/bitweb/web/live` and `/home/bitweb/web/staging`, respectively.

## Server access

Ask `odinho`, `haavares`, `jonnor` for SSH access if you need it.
