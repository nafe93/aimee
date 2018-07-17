# Aimee

## Installation

<!-- lang: bash -->
    cd docker
    docker-compose up -d nginx mysql
    docker ps
    docker exec -it docker_workspace_1 bash
    composer install
    npm install
    bower install --allow-root
    cp .env.example .env
    php artisan key:generate
    php artisan migrate

Go to 127.0.0.1 in your browser
If you get SQL errors (see storage/logs/laravel.log):

<!-- lang: bash -->
    docker exec -it docker_mysql_1 bash
    mysql -u root -p
    Enter password: root
    CREATE USER 'aimee'@'%' IDENTIFIED BY 'secret';
    GRANT ALL PRIVILEGES ON *.* TO 'aimee'@'%';
    FLUSH PRIVILEGES;
    CREATE DATABASE aimee;
    exit
    exit

Then re-run the installation steps

If you get permission errors:

<!-- lang: bash -->
    cd ..
    sudo chown -R $USER aimee

## Official Documentation

Documentation for the project can be found on the [Aimee website](https://getaimee.com).

## Security Vulnerabilities

If you discover a security vulnerability within Aimee, please send an e-mail to the project maintainer. All security vulnerabilities will be promptly addressed.

## License

The project is licensed under a generic proprietary license.
