#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

echo "Building Virtual Machine for Avans Security Workshop..."
echo "(Requires vmbuilder, install with: 'sudo apt-get install python-vm-builder')"

sudo vmbuilder vmw6 ubuntu --flavour virtual --arch i386 -o \
  --firstboot $DIR/firstboot.sh \
  --user security --pass security --name "Security Workshop" \
  --addpkg apache2 --addpkg apache2-mpm-prefork \
  --addpkg git-core \
  --addpkg php5-cli --addpkg php5-mysql --addpkg libapache2-mod-php5 \
  --addpkg mysql-server --addpkg mysql-client
