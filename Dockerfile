# Dockerfile
FROM tomsik68/xampp:8

# xdebug 
RUN apt-get update
RUN apt-get install autoconf -y
RUN apt-get install build-essential -y
RUN /opt/lampp/bin/pecl install xdebug-3.2.1
RUN echo "zend_extension=xdebug" >> /opt/lampp/etc/php.ini