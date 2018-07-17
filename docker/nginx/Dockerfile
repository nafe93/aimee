FROM nginx:latest

MAINTAINER aimee

ADD nginx.conf /etc/nginx/
ADD aimee.conf /etc/nginx/sites-available/

RUN echo "upstream php-upstream { server php-fpm:9000; }" > /etc/nginx/conf.d/upstream.conf

RUN usermod -u 1000 www-data

CMD ["nginx", "-g", "daemon off;"]

EXPOSE 80 443
