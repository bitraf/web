# bitraf.no

The code for [Bitraf.no](http://bitraf.no) website.

## Making changes

`TODO: Document`


## Server setup

The server is running on a Linode VPS with Debian Jessie.
The webserver used is NGinX, and you will find the most relevant config under `/etc/nginx/sites-available-bitraf`.

There are two versions of this code base served. One for production (https://bitraf.no), and one for staging/testing (https://bitraf.no:4433/). The two repositories are at `/home/bitweb/web/live` and `/home/bitweb/web/staging`, respectively.

## Server access

Ask `odinho`, `haavares`, `jonnor` for SSH access if you need it.
