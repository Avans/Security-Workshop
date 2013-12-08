#!/bin/sh

# This script is run the first time the VM boots up.
# It configures the VM for the security workshop
DIR=/home/security/workshop
echo "Initializing this VM for the Security Workshop..."

# Get the workshop files
git clone https://github.com/Avans/Security-Workshop.git $DIR

# Add boot.sh to the boot sequence
echo "$DIR/build-vm/boot.sh" >> /etc/rc.local

# Resume normal boot sequence
$DIR/build-vm/boot.sh
