#!/bin/bash

echo "Building Virtual Machine for Avans Security Workshop..."

sudo vmbuilder vmw6 ubuntu --flavour virtual --arch i386 -o \
  --firstboot boot.sh \
  --user security --pass security --name "Security Workshop" \
  --addpkg apache2 --addpkg apache2-mpm-prefork --addpkg phpmyadmin \
  --addpkg git-core \
  --addpkg php5-cli --addpkg php5-mysql --addpkg libapache2-mod-php5 \
  --addpkg mysql-server --addpkg mysql-client
