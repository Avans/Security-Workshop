#!/bin/sh
# This script runs each time the VM starts up

echo
cd /home/security/workshop

# Update repository
git pull origin master

# Update Apache configuration
cp build-vm/security-workshop.apache.conf /etc/apache2/sites-available/security-workshop.conf
a2dissite 000-default
a2ensite security-workshop
service apache2 reload

# Show welcome message
IP=`ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print \$1}'`

echo
echo
echo " De Security Workshop VM is nu opgestart"
echo " Ga met je browser naar deze URL:"
echo
echo "       \033[0;32mhttp://$IP/\033[0m"
echo
