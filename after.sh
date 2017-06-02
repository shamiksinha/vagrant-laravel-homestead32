#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
apt-get -y update
apt-get -y install --fix-missing
apt-get -y update
apt-get -y upgrade 
apt-get -y dist-upgrade 
apt-get -y autoremove