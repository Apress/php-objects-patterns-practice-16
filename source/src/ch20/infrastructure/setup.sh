#!/bin/bash


VAGRANTDIR=/vagrant
SERVERDIR=/var/www/poppch20/

sudo rpm -Uvh https://mirror.webtatic.com/yum/el6/latest.rpm
sudo yum install -y patch
sudo yum install -y vim

sudo yum -q -y install mysql-server
sudo yum -q -y install httpd;
sudo yum -q -y install php70w
sudo yum -q -y install php70w-mysql
sudo yum -q -y install php70w-xml
sudo yum -q -y install php70w-dom

#cd /tmp
#curl -sS https://getcomposer.org/installer | php
#sudo mv composer.phar /usr/bin/composer
#
sudo service mysqld start
/usr/bin/mysqladmin -s -u root password 'vagrant' || echo "** unable to create pass - probably already done"
echo "CREATE DATABASE IF NOT EXISTS poppch20_vagrant" | mysql -u root -pvagrant
# install data here if needed
#
echo "GRANT ALL PRIVILEGES  ON poppch20_vagrant.* TO 'vagrant'@'localhost' IDENTIFIED BY 'vagrant' WITH GRANT OPTION" | mysql -u root -pvagrant
echo "FLUSH PRIVILEGES" | mysql -u root -pvagrant
sudo /sbin/chkconfig mysqld on

sudo cp $VAGRANTDIR/poppch20.conf /etc/httpd/conf.d/
sudo service httpd restart
sudo /sbin/chkconfig httpd on
#
#cd $SERVERDIR
##composer install
#
