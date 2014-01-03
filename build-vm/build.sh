#!/bin/bash

BUILDDIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

sed "s|BUILDDIR|$BUILDDIR|g" < vmbuilder.cfg.template  > vmbuilder.cfg
sed "s|BUILDDIR|$BUILDDIR|g" < vmbuilder.copy.template > vmbuilder.copy

echo "Building Virtual Machine for Avans Security Workshop..."
echo "(Requires vmbuilder, install with: 'sudo apt-get install python-vm-builder')"

sudo vmbuilder vmw6 ubuntu --config vmbuilder.cfg -o
