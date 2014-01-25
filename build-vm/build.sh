#!/bin/bash

BUILDDIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

sed "s|BUILDDIR|$BUILDDIR|g" < vmbuilder.cfg.template  > vmbuilder.cfg
sed "s|BUILDDIR|$BUILDDIR|g" < vmbuilder.copy.template > vmbuilder.copy

echo "Building Virtual Machine for Avans Security Workshop..."
echo "(Requires vmbuilder, install with: 'sudo apt-get install python-vm-builder')"

sudo vmbuilder vmw6 ubuntu --config vmbuilder.cfg -o

sudo sed -i "s/bridged/nat/" ubuntu-vmw6/security-workshop.vmx
sudo mv ubuntu-vmw6/*.vmdk ubuntu-vmw6/security-workshop.vmdk
sudo sed -i "s/fileName = \"[^\"]*\"/fileName = \"security-workshop.vmdk\"/" ubuntu-vmw6/security-workshop.vmx
