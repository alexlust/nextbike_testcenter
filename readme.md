#Nextbike-Testcenter

###Requirements

To use the virtual machines from vagrant we need to install
virtual box and vagrant explicit on our physical machines

1. VirtualBox [download here](https://www.virtualbox.org/wiki/Downloads)
2. Vagrant [download here](https://www.vagrantup.com/downloads.html)

###Setup

1. vagrant up (in the root directory of your repository folder)
2. vagrant ssh 
3. cd /vagrant
4. composer install
5. composer update
6. ready!

### Webserver runs on --> [http://192.168.56.101/](http://192.168.56.101/)

###BEHAT

* The .env file in the root directory includes the api path
* To run all behat tests type "vendor/bin/behat" in your virtual machine 
* You can mark your tests with @tagname on top of the feature to run it with vendor/bin/behat --tags tagname

###workflow:
1. create a new feature in src/tests/integration/features
2. create a new context in src/tests/integration/bootstrap
3. register the new feature and context in config/behat.yml
4. run /vagrant/bin/behat in your virtual machine. Behat creates function templates for you. Copy it into your context.

