Sentient Skeleton App
=====================

This is the Skeleton App for [Sentient Content Management Framework](https://github.com/mikegibson/sentient).

Installation
------------
The easiest installation method is to just boot the included Vagrant box. This will boot and provision the virtual machine, and download all Composer dependencies.

1. Install [Vagrant](http://www.vagrantup.com/)
2. Clone this repository into your project folder
3. Run "vagrant up"
4. SSH into the Vagrant box and into the /vagrant directory
5. Run "php cli.php updateSchema" to build the database
6. You should now be able to access the app from your browser
7. Run "php cli.php addUser username email password" to add an admin user