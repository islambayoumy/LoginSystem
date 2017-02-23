# Simple Login System
A simple login system web application developed using php [laravel](https://laravel.com) framework.

### Application features
* Google login integrated api
* Receiving email for verification

## Getting Started

### Prerequisites
Following steps assume that you have installed  
1. [Oracle VM VirtualBox](https://www.virtualbox.org)  
2. [Vagrant](https://www.vagrantup.com)  
3. [Homestead](https://laravel.com/docs/5.4/homestead)

~ if not please install them at first

### Download the project
- Change the directory to your Homestead folder where 'Vagrantfile' is placed
- Open terminal and type   
`vagrant up`    
it may take a few minutes
- Now ssh to your box using this command   
`vagrant ssh`
- Now change the directory to the folder you used to create new applications' projects in using `cd [DIRECTORY]`
- Download project files through
`git clone https://github.com/islambayoumy/LoginSystem.git`

### Setting up mysql database
- Go type `mysql` in the terminal
- `create database LoginApp;`
- `exit`

### Congfigure Mail
- Open .env
- Go change 'MAIL_USERNAME' and 'MAIL_PASSWORD' to your personal/server email and password    
~ this for sending confirmation mail

### Adding site
- Add site 'loginsystem.app' to 'Homestead.yaml' and '/etc/hosts/' files

### Migrate database
- Now back to terminal, `cd [LoginSystem]`
- Type the following command    
`php artisan migrate`    
`vagrant provision`

## Browsing application
Now you can browse the application through http://loginsystem.app:8000
