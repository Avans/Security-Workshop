#!/bin/sh
echo
cd /home/security/workshop
git pull origin master

IP=`ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print \$1}'`

echo
echo
echo " De Security Workshop VM is nu opgestart"
echo " Ga met je browser naar deze URL:"
echo
echo "       \033[0;32mhttp://$IP/\033[0m"
echo
