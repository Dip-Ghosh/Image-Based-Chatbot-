<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Project Set up

- First Install Homestead and vagrant.
- Clone the Project from the repository git
  clone https://github.com/Dip-Ghosh/-Image-Based-Chatbot-with-Laravel-and-ChatGPT-.git
- Go inside vagrant and install the project by composer install
- Run cp .env.example .env
- Run php artisan key:generate
- Add the host name in /etc/hosts file same as site given in homestead.yaml file
- In the Homestead.yaml file set php version 8.2 and set database
- Run vagrant reload --provision
- Then run php artisan migrate
- Now you are ready to go