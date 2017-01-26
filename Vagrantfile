# v 1.1.0
# Original author helpers.ch 2017
# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    config.vm.box = "scotch/box"
    config.vm.synced_folder ".", "/var/www", type: "nfs"

    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
    config.hostmanager.manage_guest = true
    config.hostmanager.ignore_private_ip = false
    config.hostmanager.include_offline = true

    config.vm.define 'helpers' do |node|
        node.vm.hostname = 'helpers.dev'
        node.vm.network :private_network, ip: '192.168.33.254'
        node.vm.network "public_network"
        node.hostmanager.aliases = %w(www.helpers.dev helpers.mhm)
        node.vm.network "forwarded_port", guest: 80, host: 33254
    end

    config.vm.provision "shell", inline: <<-SHELL
        ###############################################################################
        ### REMOVE THE COMMENTS FOR THE NEEDED PHP VERSION IN THE FOLLOWING SECTION ###
        ###############################################################################

        # apt update
        sudo apt-get update

        # PHP 5.6
        sudo sed -i 's/.*always_populate_raw_post_data.*/always_populate_raw_post_data = -1/' /etc/php5/apache2/php.ini
        sudo sed -i 's/.*max_execution_time.*/max_execution_time = 240/' /etc/php5/apache2/php.ini
        sudo sed -i 's/.*max_input_vars.*/max_input_vars = 1500/' /etc/php5/apache2/php.ini

        # PHP 7
        # sudo add-apt-repository -y ppa:ondrej/php
        # sudo apt-get install -y php7.0
        # sudo apt-get update
        # sudo apt-get install -y php7.0-mysql libapache2-mod-php7.0 php7.0-gd php7.0-mysqli php7.0-soap php7.0-xml php7.0-zip php7.0-mbstring php7.0-curl
        # sudo a2dismod php5
        # sudo a2enmod php7.0
        # sudo apachectl restart
        # sudo sed -i 's/.*always_populate_raw_post_data.*/always_populate_raw_post_data = -1/' /etc/php/7.0/apache2/php.ini
        # sudo sed -i 's/.*max_execution_time.*/max_execution_time = 240/' /etc/php/7.0/apache2/php.ini
        # sudo sed -i 's/.*max_input_vars.*/max_input_vars = 1500/' /etc/php/7.0/apache2/php.ini

        # MySQL 5.6
        sudo apt-get install -y mysql-server-5.6 mysql-server-core-5.6
        sudo /etc/init.d/mysql start

        # SSL if needed
        # sudo a2enmod ssl
        # sudo sed -i -e '\$a<VirtualHost *:443>' /etc/apache2/sites-available/000-default.conf
        # sudo sed -i -e '\$aSSLEngine on' /etc/apache2/sites-available/000-default.conf
        # sudo sed -i -e '\$aSSLCertificateFile /etc/ssl/certs/helpers.crt' /etc/apache2/sites-available/000-default.conf
        # sudo sed -i -e '\$aSSLCertificateKeyFile /etc/ssl/private/helpers.key' /etc/apache2/sites-available/000-default.conf
        # sudo sed -i -e '\$aDocumentRoot /var/www/web' /etc/apache2/sites-available/000-default.conf
        # sudo sed -i -e '\$a</VirtualHost>' /etc/apache2/sites-available/000-default.conf
        # sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/helpers.key -out /etc/ssl/certs/helpers.crt -subj "/C=CH/ST=Schweiz/L=Bern/O=frappant/OU=IT Department/CN=webfactory"

        #Change web root + add context
        sudo sed -i s,/var/www/public,/var/www,g /etc/apache2/sites-available/000-default.conf
        sudo sed -i s,/var/www/public,/var/www,g /etc/apache2/sites-available/scotchbox.local.conf
        sudo sed -i -e '/<VirtualHost /a SetEnv TYPO3_CONTEXT Development' /etc/apache2/sites-available/000-default.conf

        # Restart Apache
        sudo service apache2 restart

    SHELL
    # Mailcatcher
    config.vm.provision "shell", inline: "/home/vagrant/.rbenv/shims/mailcatcher --http-ip=0.0.0.0", run: "always"
end
